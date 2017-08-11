<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class SearchController extends Controller{

        function course(){
            $this->display();
        }

        function resource(){
            $key=$_POST['key'];
            $resource=M('resource');
            $values=$resource->query("select * from resource WHERE r_id LIKE '%$key%' 
                    OR r_name LIKE '%$key%' OR r_uploaderphone LIKE '%$key%'
                    OR r_course LIKE '%$key%' OR r_keyword LIKE '%$key%'");
            $count= count($values);// 查询满足要求的总记录数
            $Page = new \Think\Page($count,8);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询
            $allData = $resource->where("r_id LIKE '%$key%'
            OR r_name LIKE '%$key%' OR r_uploaderphone LIKE '%$key%'
            OR r_course LIKE '%$key%' OR r_keyword LIKE '%$key%'")->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }
    }
