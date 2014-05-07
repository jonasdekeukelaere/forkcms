{include:{$BACKEND_CORE_PATH}/layout/templates/head.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/structure_start_module.tpl}

<div class="pageTitle">
    <h2>{$lblPartner|ucfirst}: {$lblEdit}</h2>
</div>

{form:edit}
    <p>
        <label for="name">{$lblName|ucfirst}<abbr>*</abbr></label>
        {$txtName} {$txtNameError}
    </p>
    {option:dgPartners}
        <div class="dataGridHolder">
            <div class="tableHeading">
                <h3>Partners</h3>
            </div>
            {$dgPartners}
        </div>
    {/option:dgPartners}

    {option:!dgPartners}<p>{$msgNoPartners}</p>{/option:!dgPartners}
    <div class="fullwidthOptions">
        <a href="{$var|geturl:'delete'}&amp;id={$item.id}" data-message-id="confirmDelete" class="askConfirmation button linkButton icon iconDelete">
            <span>{$lblDelete|ucfirst}</span>
        </a>

        <div id="confirmDelete" title="{$lblDelete|ucfirst}?" style="display: none;">
            <p>
                {$msgConfirmDelete|sprintf:{$item.name}}
            </p>
        </div>
        <div class="buttonHolderRight">
            <input id="editButton" class="inputButton button mainButton" type="submit" name="edit" value="{$lblSave|ucfirst}" />
            <a href="{$var|geturl:'add_partner'}&amp;id={$item.id}" class="button linkButton icon iconAdd">
                <span>{$lblAddPartner|ucfirst}</span>
            </a>
        </div>
    </div>
{/form:edit}

{include:{$BACKEND_CORE_PATH}/layout/templates/structure_end_module.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/footer.tpl}