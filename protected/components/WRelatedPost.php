<?php
// Похожие посты
class WRelatedPost extends CWidget {
    // Получаем массив с тегами для поста
    public $tags;
    // Количество похожих статей
    private $postCount = 5;

    public function init() {
        /*$tag = explode(',', $this->tags);
        foreach($tag as $k=>$v) {
            $posts = Post::model()->findAll('status=2 AND tags=yii');
            foreach($posts as $k2=>$v2) {
                echo $v2->title;
            }
        }*/
    }

}