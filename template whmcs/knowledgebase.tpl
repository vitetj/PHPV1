{include file="$template/pageheader.tpl" title=$LANG.knowledgebasetitle}

<div class="well">
    <div class="textcenter">
        <form method="post" action="knowledgebase.php?action=search" class="form-stacked">
            <fieldset>
        	    <input class="bigfield" name="search" type="text" value="{$LANG.kbquestionsearchere}" onfocus="this.value=(this.value=='{$LANG.kbquestionsearchere}') ? '' : this.value;" onblur="this.value=(this.value=='') ? '{$LANG.kbquestionsearchere}' : this.value;"/>
                <input type="submit" class="btn large primary" value="{$LANG.knowledgebasesearch}" />
        	</fieldset>
        </form>
    </div>
</div>

{include file="$template/subheader.tpl" title=$LANG.knowledgebasecategories}
<div class="clear cut center"></div>
<div class="row">
<div class="clearfix">
{foreach from=$kbcats item=kbcat}
    <div class="col4">
        <div class="internalpadding">
            <img src="images/folder.gif" /> <a href="{if $seofriendlyurls}knowledgebase/{$kbcat.id}/{$kbcat.urlfriendlyname}{else}knowledgebase.php?action=displaycat&amp;catid={$kbcat.id}{/if}" class="fontsize2"><strong>{$kbcat.name}</strong></a> ({$kbcat.numarticles})<br />
            {$kbcat.description}
        </div>
    </div>
{/foreach}
</div>
</div>

{include file="$template/subheader.tpl" title=$LANG.knowledgebasepopular}
<div class="clear cut center"></div>
{foreach from=$kbmostviews item=kbarticle}

<div class="row">
    <img src="images/article.gif"> <a href="{if $seofriendlyurls}knowledgebase/{$kbarticle.id}/{$kbarticle.urlfriendlytitle}.html{else}knowledgebase.php?action=displayarticle&amp;id={$kbarticle.id}{/if}" class="fontsize2"><strong>{$kbarticle.title}</strong></a><br />
    {$kbarticle.article|truncate:100:"..."}
</div>
{/foreach}