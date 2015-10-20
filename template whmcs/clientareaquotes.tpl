{include file="$template/pageheader.tpl" title=$LANG.quotestitle desc=$LANG.quotesintro}

<p>{$numitems} {$LANG.recordsfound}, {$LANG.page} {$pagenumber} {$LANG.pageof} {$totalpages}</p>

<br />

<table class="zebra-striped">
    <thead>
        <tr>
            <th{if $orderby eq "id"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=id">{$LANG.quotenumber}</a></th>
            <th{if $orderby eq "subject"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=subject">{$LANG.quotesubject}</a></th>
            <th{if $orderby eq "datecreated"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=datecreated">{$LANG.quotedatecreated}</a></th>
            <th{if $orderby eq "validuntil"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=validuntil">{$LANG.quotevaliduntil}</a></th>
            <th{if $orderby eq "stage"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=stage">{$LANG.quotestage}</a></th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$quotes item=quote}
        <tr>
            <td><a href="dl.php?type=q&id={$quote.id}" target="_blank">{$quote.id}</a></td>
            <td>{$quote.subject}</td>
            <td>{$quote.datecreated}</td>
            <td>{$quote.validuntil}</td>
            <td>{$quote.stage}</td>
            <td class="textcenter"><input type="button" class="btn info" value="{$LANG.quotedownload}" onclick="window.location='dl.php?type=q&id={$quote.id}'" /></td>
        </tr>
{foreachelse}
        <tr>
            <td colspan="6" class="textcenter">{$LANG.norecordsfound}</td>
        </tr>
{/foreach}
    </tbody>
</table>

<div class="recordslimit">
    <form method="post" action="{$smarty.server.PHP_SELF}?action={$clientareaaction}" />
    <select name="itemlimit" onchange="submit()">
        <option>{$LANG.resultsperpage}</option>
        <option value="10"{if $itemlimit==10} selected{/if}>10</option>
        <option value="25"{if $itemlimit==25} selected{/if}>25</option>
        <option value="50"{if $itemlimit==50} selected{/if}>50</option>
        <option value="100"{if $itemlimit==100} selected{/if}>100</option>
        <option value="all"{if $itemlimit==99999999} selected{/if}>{$LANG.clientareaunlimited}</option>
    </select>
    </form>
</div>

<div class="pagination">
    <ul>
        <li class="prev{if !$prevpage} disabled{/if}"><a href="{if $prevpage}clientarea.php?action=quotes&amp;page={$prevpage}{else}javascript:return false;{/if}">&larr; {$LANG.previouspage}</a></li>
        <li class="next{if !$nextpage} disabled{/if}"><a href="{if $nextpage}clientarea.php?action=quotes&amp;page={$nextpage}{else}javascript:return false;{/if}">{$LANG.nextpage} &rarr;</a></li>
    </ul>
</div>