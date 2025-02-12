<?php

namespace Illuminate\View\Compilers\Concerns;

trait CompilesComponents
{
    /**
     * Compile the component statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileComponent($expression)
    {
        return "<?php \$__env->startComponent{$expression}; ?>";
    }

    /**
     * Compile the end-component statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndComponent()
    {
        return '<?php echo $__env->renderComponent(); ?>';
    }

    /**
     * Compile the slot statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileSlot($expression)
    {
        return "<?php \$__env->slot{$expression}; ?>";
    }

    /**
     * Compile the end-slot statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndSlot()
    {
        return '<?php $__env->endSlot(); ?>';
    }

    /**
     * Compile the scoped-slot statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileScopedSlot($expression)
    {
        $expression = $this->stripParentheses($expression);

        return "<?php \$__env->scopedSlot({$expression} { ?>";
    }

    /**
     * Compile the end-scoped-slot statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndScopedSlot()
    {
        return '<?php }); ?>';
    }

    /**
     * Compile the component-first statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileComponentFirst($expression)
    {
        return "<?php \$__env->startComponentFirst{$expression}; ?>";
    }

    /**
     * Compile the end-component-first statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndComponentFirst()
    {
        return $this->compileEndComponent();
    }
}
