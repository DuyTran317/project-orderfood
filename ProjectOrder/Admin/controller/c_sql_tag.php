<?php
    function addTag($link, $vi_name, $en_name)
    {
        $sql = "INSERT INTO `of_tag`(`vi_name`, `en_name`) VALUES (N'{$vi_name}', '{$en_name}')";
        return $r = mysqli_query($link,$sql);
    }
    function selectAllTag($link)
    {
        $kq = array();
        $sql = "select * from `of_tag`";
        $r = mysqli_query($link,$sql);
        while($rs = mysqli_fetch_assoc($r))
        {
            $kq[]=$rs;
        }
        return $kq;
    }
    function selectTag($link,$id)
    {
        $sql = "select * from `of_tag` where `id`={$id}";
        $r = mysqli_query($link,$sql);
        return $rs = mysqli_fetch_assoc($r);
    }
    function saveTagsFood($link, $food_id)
    {
        $sql = "DELETE FROM `of_food_tag` WHERE `id_food` = {$food_id}";
        $r = mysqli_query($link,$sql);
        if(isset($_SESSION['tag'])&&count($_SESSION['tag'])>0)
        {
            foreach ($_SESSION['tag'] as $item => $value)
            {
                $sql="INSERT INTO `of_food_tag` VALUES ($food_id,$item)";
                $r = mysqli_query($link,$sql);
            }
        }
    }
    function selectAllTagsFood($link,$food_id)
    {
        $kq = array();
        $sql = "select * from `of_food_tag` where `id_food` = $food_id";
        $r = mysqli_query($link,$sql);
        while($rs = mysqli_fetch_assoc($r))
        {
            $kq[]=$rs;
        }
        return $kq;
    }
    function selectIdFoodLike($link,$food_id,$tags)
    {
        $kq = array();
        $sql = "select b.*,a.`id_food`, COUNT(id_tag) as numtagstrue from `of_food_tag` as a, `of_food` as b where a.`id_food` = b.`id` AND (";
        foreach ($tags as $i){
            $sql.= " a.`id_tag` = {$i['id_tag']} OR";
        }
        $sql .= " a.`id_tag` = 0 ) AND a.`id_food` <> {$food_id} GROUP BY a.`id_food` ORDER BY numtagstrue DESC LIMIT 0,10";
        $r = mysqli_query($link,$sql);
        while($rs = mysqli_fetch_assoc($r))
        {
            $kq[]=$rs;
        }
        return $kq;
    }
?>