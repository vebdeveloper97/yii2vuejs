<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_posts".
 *
 * @property int $id
 * @property string $title
 * @property string|null $text
 * @property string|null $author
 * @property string|null $phone
 * @property string|null $email
 */
class NewsPosts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'author' => 'Author',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }
}
