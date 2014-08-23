#Yii2 blocks

Easy way to embed some code to template.


##Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist asdf-studio/yii2-block "*"
```

or add

```
"asdf-studio/yii2-block": "*"
```

to the require section of your `composer.json` file.


##Usage

```php
use asdfstudio\block\Block;
use another\vendor\Comments;
use another\vendor\Share;

// register share buttons
Block::append('blog.post.footer', Share::widget([...]))
// register comments widget
Block::append('blog.post.footer', Comments::widget([...]));
```

In template:

```php
<div class="post">
    <!-- some post content -->
</div>
<div class="post-footer">
    <?php echo Block::show('blog.post.footer')?>
</div>
```

or if you want to show stub for empty block:

```php
<?php if (Block::exists('sidebar')):?>
    <?php echo Block::show('sidebar')?>
<?php else:?>
    <h3>Sidebar is empty</h3>
<?php endif?>
```


##License

BSD-3-Clause
