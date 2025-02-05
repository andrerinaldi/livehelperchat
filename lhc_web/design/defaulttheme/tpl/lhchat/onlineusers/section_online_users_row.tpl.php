<tr ng-repeat="ou in group.ou | orderBy:online.predicate:online.reverse | filter:query track by ou.id" id="uo-vid-{{ou.vid}}" class="online-user-filter-row" ng-class="{<?php echo $onlineCheck?>}">
    	<td nowrap width="1%">
        	<div>
                {{ou.lastactivity_ago}} <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','ago');?><br/>
        	<span class="fs-11">{{ou.time_on_site_front}}</span>
            </div>
    	</td>       	
    	<td>
        	<div ng-if="ou.vid" class="btn-group" role="group" aria-label="...">
                <a href="#" class="btn btn-xs btn-secondary" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Copy nick');?>" onclick="lhinst.copyContent($(this))" data-success="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Copied');?>" data-copy="{{ou.nick}}"><i class="material-icons mr-0">content_copy</i></a>
    			<a href="#" ng-click="online.showOnlineUserInfo(ou.id)" class="btn btn-xs btn-secondary" id="ou-face-{{ou.vid}}" <?php include(erLhcoreClassDesign::designtpl('lhchat/onlineusers/face_icon.tpl.php'));?> ><i class="material-icons">info_outline</i>{{ou.nick}}&nbsp;<img ng-if="ou.user_country_code != ''" ng-src="<?php echo erLhcoreClassDesign::design('images/flags');?>/{{ou.user_country_code}}.png" alt="{{ou.user_country_name}}" /></a><?php include(erLhcoreClassDesign::designtpl('lhchat/onlineusers/custom_online_button_multiinclude.tpl.php')); ?><span ng-click="online.previewChat(ou)" class="btn btn-xs btn-success action-image" ng-show="ou.chat_id > 0"><i class="material-icons">chat</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Chat');?></span><span class="btn btn-xs btn-info" ng-show="ou.total_visits > 1"><i class="material-icons">face</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Returning');?> ({{ou.total_visits}})</span><span class="btn btn-success btn-xs" ng-show="ou.total_visits == 1"><i class="material-icons">face</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','New');?></span> <span title="{{ou.operator_user_string}} <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','has sent a message to the user');?>" class="btn btn-xs" ng-show="ou.operator_message" ng-class="ou.message_seen == 1 ? 'btn-success' : 'btn-danger'"><i class="material-icons">chat_bubble_outline</i>{{ou.message_seen == 1 ? trans.msg_seen : trans.msg_not_seen}}</span><span class="btn btn-xs btn-primary up-case-first" ng-if="ou.user_country_code != ''">{{ou.user_country_name}}{{ou.city != '' ? ' | '+ou.city : ''}}</span><span class="btn btn-primary btn-xs"><i class="material-icons">access_time</i>{{ou.visitor_tz}} - {{ou.visitor_tz_time}}</span>
                <a href="#" class="btn btn-xs btn-secondary" ng-click="lhc.openModal('chat/sendnotice/'+ou.id);"><i class="material-icons">send</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Start a chat');?></a>
    		</div>
        	
            <div class="abbr-list" ng-if="ou.page_title || ou.current_page">
				<i class="material-icons" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Page');?>">&#xE8A0;</i><a target="_blank" href="{{ou.current_page}}" title="{{ou.current_page}}">{{ou.page_title || ou.current_page}}</a>
			</div>
			
			<div class="abbr-list" ng-if="ou.referrer">
				<i class="material-icons" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','From');?>">&#xE8A0;</i><a target="_blank" href="http:{{ou.referrer}}" title="{{ou.referrer}}">{{ou.referrer}}</a>
			</div>
				
        	</td>

            <?php include(erLhcoreClassDesign::designtpl('lhchat/lists/additional_column_body_online.tpl.php'));?>

            <td>
            <div style="width:90px" ng-if="ou.vid">
    	        <div class="btn-group" role="group" aria-label="...">
    	        
    	            <?php include(erLhcoreClassDesign::designtpl('lhsystem/configuration_links/proactive_pre.tpl.php'));?>
    	            
    	            <?php if ($system_configuration_proactive_enabled == true) : ?>
    	            <button ng-click="online.sendMessage(ou.id)" class="btn btn-secondary btn-sm material-icons mat-100 mr-0" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Send message');?>">chat</button>
    	            <?php endif;?>
    	            
    	            <button ng-click="online.deleteUser(ou,'<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/list','Are you sure?')?>');" class="btn btn-danger btn-sm material-icons mat-100 mr-0" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/buttons','Delete');?>, ID - {{ou.id}}">delete</button>
    			</div>
    		</div>
            </td>
	</tr>