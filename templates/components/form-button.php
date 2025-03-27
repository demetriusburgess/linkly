<?php

function form_button(string $text):string {
    return <<<HTML
        <fieldset class="pt-4 pb-2 text-center">
            <button class="btn btn-primary fs-6 fw-bold text-uppercase w-100 _color--basic-white">{$text}</button>
        </fieldset>
    HTML;
}