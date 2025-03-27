<?php 
function form_input(string $type = "text", string $id = "",  string $label = "", bool $floatingLabel = false):string {
    if ("" === $label) {
        return <<<HTML
            <fieldset class="mt-1 mb-1">
                <input type="{$type}" id="{$id}" class="form-control">
            </fieldset>
        HTML;
    }

    return <<<HTML
        <fieldset class="mt-1 mb-1">
             <label for="{$id}" class="form-label">{$label}</label>
             <input type="{$type}" id="{$id}" class="form-control">
        </fieldset>
    HTML;
}