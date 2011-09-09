{include:{$BACKEND_CORE_PATH}/layout/templates/head.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/structure_start_module.tpl}

{form:add}
	<div class="box horizontal">
		<div class="heading">
			<h3>{$lblTemplates|ucfirst}: {$lblAddTemplate}</h3>
		</div>

		<div class="options">
			<p>
				<label for="file">{$msgPathToTemplate|ucfirst}</label>
				{$ddmTheme}<small><code>/core/layout/templates/</code></small>{$txtFile} {$ddmThemeError} {$txtFileError}
				<span class="helpTxt">{$msgHelpTemplateLocation}</span>
			</p>
			<p>
				<label for="label">{$lblLabel|ucfirst}</label>
				{$txtLabel} {$txtLabelError}
			</p>
		</div>
	</div>

	<div class="box horizontal">
		<div class="heading">
			<h3>{$lblPositions|ucfirst}</h3>
		</div>

		{* Don't change this ID *}
		<div id="positionsList" class="options">

			{iteration:positions}
				<div class="position clearfix"{option:!positions.i} style="display: none"{/option:!positions.i}>

					{* Title & button to delete this position *}
					<label for="position{$positions.i}"><span class="positionLabel">{$lblPosition|ucfirst}</span> <a href="#" class="deletePosition button icon iconOnly iconDelete"><span>{$lblDeletePosition|ucfirst}</span></a></label>

					{* Position name *}
					{$positions.txtPosition}

					{$positions.txtPositionError}

					<div class="defaultBlocks">

						{* Default blocks for this position *}
						{option:positions.blocks}
							{iteration:positions.blocks}
								<div class="defaultBlock">
									{$positions.blocks.ddmType}
									{$positions.blocks.ddmTypeError}

									{* Button to remove block from this position *}
									<a href="#" class="deleteBlock button icon iconOnly iconDelete"><span>{$lblDeleteBlock|ucfirst}</span></a>
								</div>
							{/iteration:positions.blocks}
						{/option:positions.blocks}

						{* Button to add new default block to this position *}
						<a href="#" class="addBlock button icon iconAdd"><span>{$lblAddBlock|ucfirst}</span></a>

					</div>

				</div>
			{/iteration:positions}

			{* Button to add new position *}
			<p>
				<a href="#" id="addPosition" class="button icon iconAdd"><span>{$lblAddPosition|ucfirst}</span></a>
			</p>

			{option:formErrors}<span class="formError">{$formErrors}</span>{/option:formErrors}
		</div>
	</div>

	<div class="box horizontal">
		<div class="heading">
			<h3>{$lblLayout|ucfirst}</h3>
		</div>

		<div id="templateLayout" class="options clearfix">
			<p>
				{$txtFormat} {$txtFormatError}
				<span class="helpTxt">{$msgHelpTemplateFormat}</span>
			</p>

			<div class="longHelpTxt">
				{$msgHelpPositionsLayout}
			</div>
		</div>
	</div>

	<div class="box horizontal">
		<div class="heading">
			<h3>{$lblStatus|ucfirst}</h3>
		</div>

		<div class="options">
			<div class="spacing">
				<ul class="inputList pb0">
					<li><label for="active">{$chkActive} {$lblActive|ucfirst}</label> {$chkActiveError}</li>
					<li><label for="default">{$chkDefault} {$lblDefault|ucfirst}</label> {$chkDefaultError}</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="fullwidthOptions">
		<div class="buttonHolderRight">
			<input id="addButton" class="inputButton button mainButton" type="submit" name="add" value="{$lblSave|ucfirst}" />
		</div>
	</div>
{/form:add}

{include:{$BACKEND_CORE_PATH}/layout/templates/structure_end_module.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/footer.tpl}
