<?php

Class  GetQiitaLikes
{

public function run($users)
{

    $data['columns'] = $this->getInfoColumns();

    foreach ($users as $user){
        foreach( $this->itemFilter($this->getItem($user)) as $v){
            $data['rows'][] = $v;
        } 
    }

    return json_encode($data);
}


private function getInfoColumns()
{
    return [  
        [ 
            'name' =>  'user_id',
            'type' =>  'string',
            'friendly_name' =>  'user_id',
        ],
        [ 
            'name' =>  'title',
            'type' =>  'string',
            'friendly_name' =>  'title',
        ],
        [ 
            'name' =>  'created_at',
            'type' =>  'datetime',
            'friendly_name' =>  'created_at',
        ],
        [ 
            'name' =>  'likes_count',
            'type' =>  'integer',
            'friendly_name' =>  'likes_count',
        ],
    ];
}


private function getItem($user)
{
    $apiurl  ='https://qiita.com/api/v2/users/' .$user . '/items?page=1&per_page=100';
    return json_decode(file_get_contents($apiurl), true);
}

private function itemFilter($items)
{
    foreach($items as $k => $item){
        $result[$k]['user_id'] =  $item['user']['id'];
        $result[$k]['title'] =  $item['title'];
        $result[$k]['created_at'] =  $item['created_at'];
        $result[$k]['likes_count'] =  $item['likes_count'];
    }
    return $result;
}
}