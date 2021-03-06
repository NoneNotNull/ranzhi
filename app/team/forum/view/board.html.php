<?php 
/**
 * The board file of forum module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     forum 
 * @version     $Id: board.html.php 4029 2016-08-26 06:50:41Z liugang $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php'; ?>
<?php include '../../../sys/common/view/treeview.html.php'; ?>
<?php js::set('boardID', $boardID);?>
<?php js::set('mode', $mode);?>
<div class='row'>
  <div class='col-xs-2'>
    <div class="input-group">
      <?php echo html::input('searchInput', isset($searchText) ? $searchText : '', "class='form-control search-query' placeholder=''"); ?>
      <span class="input-group-btn">
        <?php echo html::a('###', "<i class='icon icon-search'></i>", "class='btn btn-primary' id='searchButton'"); ?>
      </span>
      <div id='querybox' class='hide'></div>
    </div>
    <?php foreach($boards as $parentBoard):?>
    <ul class="nav nav-primary nav-stacked">
      <li class="nav-heading"><?php echo $parentBoard->name;?></li>
      <?php foreach($parentBoard->children as $childBoard):?>
      <li><?php commonModel::printLink('forum', 'board', "id=$childBoard->id", $childBoard->name, "id='board{$childBoard->id}'");?></li>
      <?php endforeach;?>
    </ul>
    <?php endforeach;?>
  </div>
  <div class='col-xs-10'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-comments-alt icon-large'></i>&nbsp;<?php $common->printForum($board);?></strong>
        <?php if($board->moderators) printf(" &nbsp;<span class='moderators'>" . $lang->forum->lblOwner . '</span>', trim(implode($board->moderators, ','), ',')); ?>
        <div class='panel-actions pull-right'>
          <?php if($this->forum->canPost($board)) commonModel::printLink('thread', 'post', "boardID=$board->id", '<i class="icon-pencil icon-large"></i>&nbsp;&nbsp;' . $lang->forum->post, "class='btn btn-primary'");?>
        </div>
      </div>
      <table class='table table-hover table-striped'>
        <thead>
          <tr class='text-center'>
            <th colspan='2'><?php echo $lang->thread->title;?></th>
            <th class='w-150px'><?php echo $lang->thread->author;?></th>
            <th class='w-100px'><?php echo $lang->thread->postedDate;?></th>
            <th class='w-50px'><?php echo $lang->thread->views;?></th>
            <th class='w-50px'><?php echo $lang->thread->replies;?></th>
            <th class='w-200px visible-lg'><?php echo $lang->thread->lastReply;?></th>
          </tr>  
        </thead>
        <tbody>
          <?php foreach($sticks as $thread):?>
          <?php if($thread->hidden and !$this->loadModel('thread')->canManage($board->id)) continue;?>
          <tr class='text-center'>
            <td class='w-10px'><span class='sticky-thread text-danger'><i class="icon-comment-alt icon-large"></i></span></td>
            <td class='text-left'>
              <?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title);?>
              <?php echo "<span class='label label-danger'>{$lang->thread->stick}</span> "?>
              <?php if($thread->hidden) echo "<span class='text-warning'>[" . $lang->thread->statusList['hidden'] . "]</span>";?>
            </td>
            <td><strong><?php echo $thread->authorRealname;?></strong></td>
            <td><?php echo substr($thread->createdDate, 5, -3);?></td>
            <td><?php echo $thread->views;?></td>
            <td><?php echo $thread->replies;?></td>
            <td class='visible-lg'>
              <?php 
              if($thread->replies)
              {
                  echo substr($thread->repliedDate, 5, -3) . ' ';
                  commonModel::printLink('thread', 'locate', "threadID={$thread->id}&replyID={$thread->replyID}", $thread->repliedByRealname);
              }
              ?>
            </td>  
          </tr>
          <?php unset($threads[$thread->id]);?>
          <?php endforeach;?>

          <?php foreach($threads as $thread):?>
          <?php if($thread->hidden and !$this->loadModel('thread')->canManage($board->id)) continue;?>
          <tr class='text-center'>
            <td class='w-10px'><?php echo $thread->isNew ? "<span class='text-success'><i class='icon-comment-alt icon-large'></i></span>" : "<span class='text-muted'><i class='icon-comment-alt icon-large'></i></span>";?></td>
            <td class='text-left'>
              <?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title);?>
              <?php if($thread->hidden) echo '<span class="text-warning">[' . $lang->thread->statusList['hidden'] .']</span>';?>
            </td>
            <td><strong><?php echo $thread->authorRealname;?></strong></td>
            <td><?php echo substr($thread->createdDate, 5, -3);?></td>
            <td><?php echo $thread->views;?></td>
            <td><?php echo $thread->replies;?></td>
            <td class='visible-lg'>
              <?php 
              if($thread->replies)
              {
                  echo substr($thread->repliedDate, 5, -3) . ' ';
                  commonModel::printLink('thread', 'locate', "threadID={$thread->id}&replyID={$thread->replyID}", $thread->repliedByRealname);
              }
              ?>
            </td>  
          </tr>  
          <?php endforeach;?>
        </tbody>
        <tfoot><tr><td colspan='7'><?php $pager->show('right', 'short');?></td></tr></tfoot>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
