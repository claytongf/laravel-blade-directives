<?php

use Appstract\BladeDirectives\DirectivesRepository;

return [

    'istrue' => function ($expression) {
        if (str_contains($expression, ',')) {
            $expression = DirectivesRepository::parseExpression($expression);

            return  "<?php if (isset({$expression->get(0)}) && (bool) {$expression->get(0)} === true) : ?>".
                    "<?php echo {$expression->get(1)}; ?>".
                    '<?php endif; ?>';
        }

        return "<?php if (isset({$expression}) && (bool) {$expression} === true) : ?>";
    },

    'endistrue' => function ($expression) {
        return '<?php endif; ?>';
    },

    'if' => function ($expression) {
        if (str_contains($expression, ',')) {
            $expression = DirectivesRepository::parseExpression($expression);

            return  "<?php if ({$expression->get(0)}) : ?>".
                    "<?php echo {$expression->get(1)}; ?>".
                    '<?php endif; ?>';
        }

        return "<?php if ({$expression}) : ?>";
    },

];
