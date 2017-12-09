<?php

namespace module\cart;
class Cart extends \core\Controller {

    //购物车列表页
    function index() {



        $data = array();
        $this->view('/cart/cart', $data);

    }

    //加入购物车
    function addCart() {
        //获取SESSION中用户的ID
        $u_id = $this->input()->session('id');
        //获取商品ID
        $goods_id = '6';
        //获取加入购物车的商品数量
        $goods_number = '2';
        //判断用户是否登录，已登录的则使用Ajax将商品信息提交到购物车数据库
        if ($u_id != false) {
            //查询购物车数据库，看数据库中该用户是否已经添加了该商品
            $has = $this->model()->get("SELECT id,goods_number FROM cart WHERE u_id='{$u_id}' AND goods_id='{$goods_id}'");
            //如果数据库中没有该用户该商品的数据，则将相关信息存入数据库
            if ($has == false) {
                //生成加入购物车的时间
                $add_time = time();
                $tid = $this->model()->insert("INSERT INTO cart(goods_id,goods_number,u_id,add_time) VALUES ('{$goods_id}','$goods_number','$u_id','$add_time')");
                echo "添加成功";

            } else {
                //已存在，则在在原有商品商量基础上，增加新的数量
                $goods_number += $has['goods_number'];
                //生成新的时间戳，作为商品修改时间
                $mod_time = time();
                $tid = $this->model()->update("UPDATE cart SET goods_number='{$goods_number}',mod_time='{$mod_time}' WHERE id='{$has['id']}'");
                echo "修改成功";
            }
        } else {
            echo "请登录！";
            $this->output()->redirect('/?m=user&c=Login');
        }

    }


}