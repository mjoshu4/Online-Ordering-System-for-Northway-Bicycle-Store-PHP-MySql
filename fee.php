    <?php
                            $queryfee ="select * from shipping_fee";
                            $resultfee = mysqli_query($conn,$queryfee);
                            while ($rowfee=mysqli_fetch_assoc($resultfee)) {
                              $str = $customer_shipping_address;
                              $split = explode(" ", $str);
                              $split = $split[count($split)-1];
                             if($split == $rowfee['shipping_city'])
                             {
                              $shipping_fee_view = '₱ '.number_format($rowfee['shipping_delivery_fee'],2);
                              $shipping_fee_view_auth = true;
                              $shipping_fee = $rowfee['shipping_delivery_fee'];
                              break;
                             }
                             else
                             {
                              $shipping_fee_view = '<span style="color:red;">Service delivery feature is not available on this area.</span>';
                              $shipping_fee_view_auth = false; //for button
                              $shipping_fee_view1= '<span style="color:red;">Warning: This city address is not listed to shipping rate.<br><br></span>'; //for orderlist remove but not now
                              $shipping_fee = 0;
                             }
                            }
                            
                          ?>