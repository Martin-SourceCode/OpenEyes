<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "site_subspecialty_anaesthetic_agent_default".
 *
 * The followings are the available columns in table 'site_subspecialty_anaesthetic_agent_default':
 * @property integer $id
 * @property string $name
 * @property string $ShortName
 */
class SiteSubspecialtyAnaestheticAgentDefault extends BaseActiveRecordVersioned
{
    /**
     * Returns the static model of the specified AR class.
     * @return SiteSubspecialtyAnaestheticAgentDefault the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'site_subspecialty_anaesthetic_agent_default';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'sites' => array(self::BELONGS_TO, 'Site', 'site_id'),
            'subspecialties' => array(self::BELONGS_TO, 'Subspecialty', 'subspecialty_id'),
            'agents' => array(self::BELONGS_TO, 'AnaestheticAgent', 'anaesthetic_agent_id')
        );
    }
}
