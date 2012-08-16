<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<p><strong>Re: Some text</strong></p>

<p>Dear <?php echo $to; ?>,</p>

<p>
	I have been asked to arrange your <?php	if ($isChild) { ?>child's <?php } ?> admission for surgery under the care of
	<?php echo CHtml::encode($consultantName) ?>. This is currently anticipated to be
	<?php
	if ($overnightStay) {
		echo 'an overnight stay';
	} else {
		echo 'a day case';
	}
	?>
	procedure.
</p>

<p>
	Please will you telephone <?php echo $changeContact ?> within 2 weeks of the date of this letter to discuss and agree a
	convenient date for this operation. If there is no reply, please leave a message and contact number on the answer phone.
</p>

<p>
	Should you<?php if ($isChild) { ?>r child<?php } ?> no longer require treatment please let me know as soon as possible.
</p>

<p nobr="true">
	Yours sincerely,
	<br/><br/><br/><br/>
	Admissions Officer
</p>
