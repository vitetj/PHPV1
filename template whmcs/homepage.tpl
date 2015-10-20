<div class="styled_title">
	<h1>{$LANG.domaincheckerchoosedomain}</h1>
</div>

<p>{$LANG.domaincheckerenterdomain}</p>

<div class="textcenter" id="buyadomain">
	<form method="post" action="domainchecker.php">
		<div class="float_left" id="input_boxes">
			<input class="bigfield" name="domain" type="text" value="{$LANG.domaincheckerdomainexample}" onfocus="if(this.value=='{$LANG.domaincheckerdomainexample}')this.value=''" onblur="if(this.value=='')this.value='{$LANG.domaincheckerdomainexample}'" />
			<div class="clear"></div>
			<input type="submit" value="{$LANG.checkavailability}" class="btn primary large float_left" />
			<input type="submit" name="transfer" value="{$LANG.domainstransfer}" class="btn success large float_left" />
			<input type="submit" name="hosting" value="{$LANG.domaincheckerhostingonly}" class="btn large float_left" />
		</div>
		
		{if $capatacha}
		<div class="captchainput" align="center">
			<p>{$LANG.captchaverify}</p>
				{if $capatacha eq "recaptcha"}
					<p>{$recapatchahtml}</p>
				{else}
					<p>
						<img src="includes/verifyimage.php" align="middle" />
							<input type="text" name="code" class="small" maxlength="5" />
					</p>
				{/if} 
		</div>
		{/if}
	</form>
	<div class="clear"></div>
</div>

<div class="clear cut center"></div>

<div class="row">
	
	<div class="col2half">
		<div class="internalpadding">
			<div class="styled_title">
				<h2>{$LANG.navservicesorder}</h2>
			</div>
			<p>{$LANG.clientareahomeorder}<br />
				<br />
			</p>
			<form method="post" action="cart.php">
				<p align="center">
					<input type="submit" value="{$LANG.clientareahomeorderbtn} &raquo;" class="btn" />
				</p>
			</form>
		</div>
	</div>
	
	<div class="col2half">
		<div class="internalpadding">
			<div class="styled_title">
				<h2>{$LANG.manageyouraccount}</h2>
			</div>
			<p>{$LANG.clientareahomelogin}<br />
				<br />
			</p>
			<form method="post" action="clientarea.php">
				<p align="center">
					<input type="submit" value="{$LANG.clientareahomeloginbtn} &raquo;" class="btn" />
				</p>
			</form>
		</div>
	</div>
	
</div>
<div class="clear cut center"></div>

<div class="row"> {if $twitterusername}
	<div class="styled_title">
		<h2>{$LANG.twitterlatesttweets}</h2>
	</div>
	<div id="twitterfeed">
		<p><img src="images/loading.gif"></p>
	</div>
	{literal}
	<script language="javascript">
jQuery(document).ready(function(){
  jQuery.post("announcements.php", { action: "twitterfeed", numtweets: 3 },
    function(data){
      jQuery("#twitterfeed").html(data);
    });
});
</script>
	{/literal}
	{elseif $announcements}
	<div class="styled_title">
		<h2>{$LANG.latestannouncements}</h2>
	</div>
	{foreach from=$announcements item=announcement}
	<p>{$announcement.date} - <a href="{if $seofriendlyurls}announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}"><b>{$announcement.title}</b></a><br />
		{$announcement.text|strip_tags|truncate:100:"..."}</p>
	{/foreach}
	{/if} </div>
