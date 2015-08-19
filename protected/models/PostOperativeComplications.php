<?php
/**
 * (C) OpenEyes Foundation, 2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (C) 2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class PostOperativeComplicationsItem extends BaseActiveRecord
{
    public function tableName()
    {
        return 'ophciexamination_postoperativecomplications';
    }

    public function relations()
    {
        return array(
            'event_type' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
        );
    }

    /**
     * Named scope to fetch enabled items for the given subspecialty
     *
     * @param int|null $subspecialty_id Null for default complications
     * @return ComplicationsItem
     */
    public function enabled($subspecialty_id = null)
    {
        $criteria = array(
            'join' => 'inner join ophciexamination_postoperativecomplications on ophciexamination_postoperativecomplications.item_id = t.id',
            'order' => 'ophciexamination_postoperativecomplications.display_order',
        );

        if ($subspecialty_id) {
            $criteria['condition'] = 'ophciexamination_postoperativecomplications.subspecialty_id = :subspecialty_id';
            $criteria['params'] = array('subspecialty_id' => $subspecialty_id);
        } else {
            $criteria['condition'] = 'ophciexamination_postoperativecomplications.subspecialty_id is null';
        }

        $this->getDbCriteria()->mergeWith($criteria);

        return $this;
    }

    /**
     * Named scope to fetch available (non-enabled) items for the given subspecialty
     *
     * @param int|null $subspecialty_id Null for default complication
     * @return PostOpComplicationsItem
     */
    public function available($subspecialty_id = null)
    {
        $criteria = array(
            'join' => 'left join ophciexamination_postoperativecomplications on ophciexamination_postoperativecomplications.item_id = t.id and ophciexamination_postoperativecomplications.subspecialty_id ',
            'condition' => 'ophciexamination_postoperativecomplications.id is null',
            'order' => 't.event_type_id, t.name',
        );

        if ($subspecialty_id) {
            $criteria['join'] .= '= :subspecialty_id';
            $criteria['params'] = array('subspecialty_id' => $subspecialty_id);
        } else {
            $criteria['join'] .= 'is null';
        }

        $this->getDbCriteria()->mergeWith($criteria);

        return $this;
    }

    /**
     * Assign the given items to the given episode summary
     *
     * @param array $item_ids
     * @param int|null $subspecialty_id
     */
    public function assign(array $item_ids, $subspecialty_id = null)
    {
        $this->dbConnection->createCommand()->delete(
            'ophciexamination_postoperativecomplications',
            $subspecialty_id ? 'subspecialty_id = :subspecialty_id' : 'subspecialty_id is null',
            array('subspecialty_id' => $subspecialty_id)
        );

        if ($item_ids) {
            $rows = array();
            foreach ($item_ids as $display_order => $item_id) {
                $rows[] = array(
                    'item_id' => $item_id,
                    'subspecialty_id' => $subspecialty_id,
                    'display_order' => $display_order,
                );
            }

            $this->dbConnection->getCommandBuilder()->createMultipleInsertCommand('ophciexamination_postoperativecomplications', $rows)->execute();
        }
    }

    public function getClassName()
    {
        return $this->event_type->class_name . '_Episode_' . str_replace(' ', '', $this->name);
    }
}
