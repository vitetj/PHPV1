{include file="$template/pageheader.tpl" title=$LANG.clientareacancelrequest}

{if $invalid}

<div class="alert-message warning">
    <p>{$LANG.clientareacancelinvalid}</p>
</div>

<div class="textcenter">
    <input type="button" value="{$LANG.clientareabacklink}" class="btn" onclick="window.location='clientarea.php?action=productdetails&id={$id}'" />
</div>

<br /><br /><br />

{elseif $requested}

<div class="alert-message success">
    <p>{$LANG.clientareacancelconfirmation}</p>
</div>

<div class="textcenter">
    <input type="button" value="{$LANG.clientareabacklink}" class="btn" onclick="window.location='clientarea.php?action=productdetails&id={$id}'" />
</div>

<br /><br /><br />

{else}

{if $error}
<div class="alert-message error">
    <p class="bold">{$LANG.clientareaerrors}</p>
    <ul>
        <li>{$LANG.clientareacancelreasonrequired}</li>
    </ul>
</div>
{/if}

<div class="alert-message block-message info">
    <p>{$LANG.clientareacancelproduct}: <strong>{$groupname} - {$productname}</strong>{if $domain} ({$domain}){/if}</p>
</div>

<form method="post" action="{$smarty.server.PHP_SELF}?action=cancel&amp;id={$id}" class="form-stacked">
<input type="hidden" name="sub" value="submit" />

    <fieldset>

        <div class="clearfix">
            <label for="cancellationreason">{$LANG.clientareacancelreason}</label>
        	<div class="input">
        	    <textarea name="cancellationreason" id="cancellationreason" rows="6" class="fullwidth"></textarea>
        	</div>
        </div>

        <div class="clearfix">
            <label for="type">{$LANG.clientareacancellationtype}</label>
        	<div class="input">
        	    <select name="type" id="type">
                <option value="Immediate">{$LANG.clientareacancellationimmediate}</option>
                <option value="End of Billing Period">{$LANG.clientareacancellationendofbillingperiod}</option>
                </select>
        	</div>
        </div>

        {if $domainid}
        <br />
        <div class="alert-message block-message warn textcenter">
        <p><strong>{$LANG.cancelrequestdomain}</strong></p>
        <p>{$LANG.cancelrequestdomaindesc|sprintf2:$domainnextduedate:$domainprice:$domainregperiod}</p>
        <div align="center"><label><input type="checkbox" name="canceldomain" id="canceldomain" /> {$LANG.cancelrequestdomainconfirm}</label></div>
        </div>
        {/if}

        <div class="actions">
            <input type="submit" value="{$LANG.clientareacancelrequestbutton}" class="btn danger" />
            <input type="button" value="{$LANG.cancel}" class="btn" onclick="window.location='clientarea.php?action=productdetails&id={$id}'" />
        </div>

    </fieldset>

</form>

{/if}