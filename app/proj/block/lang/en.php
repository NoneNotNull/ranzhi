<?php
/**
 * The en file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->block->common   = 'Blocks';
$lang->block->lblBlock = 'Block';
$lang->block->admin    = 'Manage Blocks';
$lang->block->type     = 'Type';
$lang->block->waitTask = 'Wait';
$lang->block->doneTask = 'Done';
$lang->block->rate     = 'Rate';

$lang->block->availableBlocks = new stdclass();
$lang->block->availableBlocks->task     = 'Tasks';
$lang->block->availableBlocks->project  = 'Projects';

$lang->block->num     = 'Number';
$lang->block->orderBy = 'Order';
$lang->block->status  = 'Status';
$lang->block->asc     = 'ASC';
$lang->block->desc    = 'DESC';
$lang->block->actions = 'Options';

$lang->block->orderByList = new stdclass();;
$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID ASC';
$lang->block->orderByList->task['id_desc']       = 'ID DESC';
$lang->block->orderByList->task['pri_asc']       = 'Priority ASC';
$lang->block->orderByList->task['pri_desc']      = 'Priority DESC';
$lang->block->orderByList->task['deadline_asc']  = 'Deadline ASC';
$lang->block->orderByList->task['deadline_desc'] = 'Deadline DESC';

$lang->block->orderByList->project = array();
$lang->block->orderByList->project['createdDate_asc']  = 'Created Date ASC';
$lang->block->orderByList->project['createdDate_desc'] = 'Created Date DESC';
$lang->block->orderByList->project['begin_asc']        = 'Begin ASC';
$lang->block->orderByList->project['begin_desc']       = 'Begin DESC';
$lang->block->orderByList->project['end_asc']          = 'End ASC';
$lang->block->orderByList->project['end_desc']         = 'End DESC';

$lang->block->typeList->task['assignedTo'] = 'Assigned to me';
$lang->block->typeList->task['createdBy']  = 'My Created';
$lang->block->typeList->task['finishedBy'] = 'My Finished';
$lang->block->typeList->task['closedBy']   = 'My Closed';
$lang->block->typeList->task['canceledBy'] = 'My CancelLed';

$lang->block->statusList->project['involved'] = 'Involved';
$lang->block->statusList->project['doing']    = 'Doing';
$lang->block->statusList->project['finished'] = 'Finished';
$lang->block->statusList->project['suspend']  = 'Suspend';
