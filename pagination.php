$page = 1;
if(isset($params[1])){
    $page = $params[1];
}
    
$num_rec_per_page=3;
$start_from = ($page-1) * $num_rec_per_page; 

$result_enq = $con->query("SELECT * FROM pt_enquiries LIMIT $start_from, $num_rec_per_page");

///// print table here ////////

<?php
    $result_enq_total = $con->query("SELECT * FROM pt_enquiries");
    $total_records = $result_enq_total->num_rows;
    $total_pages = ceil($total_records / $num_rec_per_page); 
    
    if($page==1){
              $first_class = 'disabled';
          $first_href =  "javascript:void(0)";
      }
      else{
          $first_class = '';
          $first_href =  intval($page)-1;
          $first_href = "talepler/".$first_href;
      }
  ?>
  <li class="<?php echo $first_class; ?>"><a href="<?php echo $first_href; ?>"><<</a></li>
                          <?php
                            for ($i=1; $i<=$total_pages; $i++) {
                                if($page==$i){
                                    $class="active";
                                    $href = "javascript:void(0)";
                                }else{
                                    $class="";
                                    $href = "talepler/$i";
                                }
                                echo "<li class='$class'><a href='$href'>".$i."</a> </li>"; 
                            }
                         
                            if($page==$total_pages){
                                $last_class = 'disabled';
                                $last_href =  "javascript:void(0)";
                            }
                            else{
                                $last_class = '';
                                $last_href =  intval($page)+1;
                                $last_href = "talepler/".$last_href;
                            }
                            ?>
                          <li class="<?php echo $last_class; ?>"><a href="<?php echo $last_href; ?>">>></a></li>
