<ul class="tabs left">
                          <li><a href="#tabdatacountry">Data</a></li>
                        </ul>
                        <div id="tabdatacountry" class="tab-content">
                          <table class="psi_width6" border="0">
                            <tr>
                              <td class="center" width ="30" title="Add" id="addnewictr"><i class="fa fa-plus fa-sm"></i></td>
                              <td class="center" width ="30" title="Edit" id="editictr"><i class="fa fa-pencil fa-sm"></i></td>
                              <td class="center" width ="30" title="Delete" id="delictr"><i class="fa fa-trash fa-sm"></i></td>
                              <td class="center" width ="30" title="Refresh" id="refreshictr"><i class="fa fa-sync fa-sm"></i></td>

                              <td class="right" width ="50">Show</td>
                              <td class="center" width ="60">
                                <select name='length_change6' id='length_change6'>
                                  <option value='5'>5</option>
                                  <option value='10'>10</option>
                                  <option value='50'>50</option>
                                  <option value='100'>100</option>
                                  <?php
                                  include 'config.php';
                                  $stmt   = $DBcon->prepare("SELECT *FROM table_country");
                                  $stmt->execute();
                                  $baris  = $stmt->rowCount();
                                  echo '<option value='.$baris.'>All</option>';
                                  ?>
                                </select>
                              </td>
                              <td class="left" width ="50">entries</td>
                              <td class="center" width ="120"></td>
                              <td class="right"  width ="50"></td>
                              <td class="center" width ="150"></td>
                              <td class="right"  width ="50"><i class="fa fa-search fa-sm"></i></td>
                              <td class="center" width ="150"><input type="text" id="newFilter6" name="newFilter6" placeholder="Search"></td>
                            </tr>
                          </table>

                          <span id="addnewctr">
                            <fieldset>
                              <legend>Add New Country</legend>
                              <table class="psi_width2" border="0">
                                <?php
                                include 'config.php';
                                $stmt   = $DBcon->prepare("SELECT *FROM table_country ORDER BY con_id DESC LIMIT 1 ");
                                $stmt->execute();
                                $baris  = $stmt->rowCount();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                  $id = $row['CountryID'];
                                  $a  = substr($id, 3,3);
                                  if ($baris == 0) {
                                    ?>
                                    <input type="hidden" name="conUrut" id="conUrut" value="1">
                                    <?php 
                                  }else{
                                    $a++; 
                                    ?>
                                    <input type="hidden" name="conUrut" id="conUrut" value="<?php echo $a; ?>">
                                    <?php 
                                  }
                                }
                                ?>  
                                <tr>             
                                  <td class="right" width="120">Country</td>
                                  <td class="left" width="200"><input type="text" id="CountryName" name="CountryName" ></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120">Lot Inv</td>
                                  <td class="left" width="200"><input type="text" id="CountryLot" name="CountryLot" ></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120">Note</td>
                                  <td class="left" width="480" colspan="3"><input type="text" id="CountryNote" name="CountryNote" ></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120"></td>
                                  <td class="left" width="200"><input id="addnewctrbtn" name="submit" type="submit" value ="Add New" class="flat-button"/></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>
                              </table>
                            </fieldset>
                          </span>



                          <span id="editingctr">
                            <fieldset>
                              <legend id="responsectr"><b></b></legend>
                              <table class="psi_width2" border="0">
                                <tr>             
                                  <td class="right" width="120">Country</td>
                                  <td class="left" width="200" id="ctrName"></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120">Lot Inv</td>
                                  <td class="left" width="200" id="ctrLot"></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120">Note</td>
                                  <td class="left" width="480" colspan="3" id="ctrNote"><input type="text" id="CountryNote" name="CountryNote" ></td>
                                  <td class="right" width="600"></td>
                                </tr>
                                <tr>                                  
                                  <td class="right" width="120"></td>
                                  <td class="left" width="200"><input id="addnewctrbtn" name="submit" type="submit" value ="Add New" class="flat-button"/></td>
                                  <td class="center" width="5"></td>
                                  <td class="right" width="275"></td>
                                  <td class="right" width="600"></td>
                                </tr>


                              </table>
                            </fieldset>
                          </span>

                          <table id="table_ctr" class="psi_width3 display" style="width:100%" border="0">
                            <thead>
                              <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Lot Inv.</th>
                                <th>Note</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>

                              </tr>
                            </tbody>
                          </table>
                          <table>
                            <tr>
                              <td height="15" ></td></tr>
                            </table>