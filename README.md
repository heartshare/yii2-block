#Yii2 blocks

Easy way to embed some code to template.

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

##License

BSD-3-Clause
