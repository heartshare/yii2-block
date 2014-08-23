<?php


namespace asdfstudio\block;


use yii\base\Widget;

/**
 * Class Block
 * @package asdfstudio\blocks
 */
class Block extends Widget
{
    /**
     * Current block for render
     * @var string
     */
    public $block;

    /**
     * List of blocks with contents
     * @var array
     */
    protected static $blocks = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!isset(self::$blocks[$this->block])) {
            return null;
        }

        $out = '';
        foreach (self::$blocks[$this->block] as $content) {
            $out .= $content;
        }
        unset(self::$blocks[$this->block]);

        return $out;
    }

    /**
     * Show block on page
     *
     * @param string $block Block name
     * @return string
     */
    public static function show($block)
    {
        return static::widget(['block' => $block]);
    }

    /**
     * Check if block have registered content to show
     * ```php
     *  <?php if (Block::exists('sidebar')):?>
     *      <?php echo Block::show('sidebar')?>
     *  <?php else:?>
     *      <h3>Sidebar is empty</h3>
     *  <?php endif?>
     * ```
     *
     * @param string $block Block name
     * @return bool
     */
    public static function exists($block)
    {
        return isset(self::$blocks[$block]);
    }

    /**
     * Append content to block
     *
     * @param string $block Block name
     * @param string $content Block content
     */
    public static function append($block, $content)
    {
        if (!isset(static::$blocks[$block])) {
            static::$blocks[$block] = [];
        }
        array_push(static::$blocks[$block], $content);
    }

    /**
     * Prepend content to block
     *
     * @param string $block Block name
     * @param string $content Block content
     */
    public static function prepend($block, $content)
    {
        if (!isset(static::$blocks[$block])) {
            static::$blocks[$block] = [];
        }
        array_unshift(static::$blocks[$block], $content);
    }
}
