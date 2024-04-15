{if $msgs->isMessage()}
	<div class="messages bottom-margin">
		<ul>
		{foreach $msgs->getMessages() as $msg}
		{strip}
			<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
		{/strip}
		{/foreach}
		</ul>
	</div>
	{/if}