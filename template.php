<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="contact-form">
	<div class="contact-form__head">
		<?
		if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
		{
			?>
			<?
			if ($arResult["isFormTitle"])
			{
				?>
				<div class="contact-form__head-title">
					<?=$arResult["FORM_TITLE"]?>
				</div>
				<?
			}
			?>
			<div class="contact-form__head-text">
				<?=$arResult["FORM_DESCRIPTION"]?>
			</div>
			<?
		}
		?>
	</div>

	<?=str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"])?>

	<div class="contact-form__form-inputs">
		<?
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
		{
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea')
			{ ?>
		<div class="contact-form__form-message">
			<div class="input">
				<label class="input__label">
					<div class="input__label-text"><?=$arQuestion["CAPTION"]?>
						<?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?>
						<?endif;?>
					</div>
					<textarea class="input__input" type="text" value=""
						name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>">
					</textarea>
				</label>
			</div>
		</div>
	</div>
			<?
			} else {
				?>
				<div class="input contact-form__input">
					<label class="input__label">
						<div class="input__label-text"><?=$arQuestion["CAPTION"]?>
							<?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?>
							<?endif;?>
						</div>
						<input class="input__input" type="<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>" value=""
							required=""
							name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>">
					</label>
				</div>
			<?
			}
		}
		?>
	<div class="input__notification">
		<?if ($arResult["isFormErrors"] == "Y"):?>
			<?=str_replace('слишком короткое значение', 'Поле должно содержать не менее 3-х символов', $arResult["FORM_ERRORS_TEXT"]);?>
		<?endif;?>
	</div>
	<div class="contact-form__bottom">
		<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
			ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
			данных&raquo;.
		</div>
		<button class="form-button contact-form__bottom-button">
			<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
				class="form-button__title" type="submit" name="web_form_submit"
				value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) ==
				'' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>"
			/>
		</button>
	</div>
		<?=$arResult["FORM_FOOTER"]?>
</div>
