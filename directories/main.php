<?php include 'connection.php';?>
<!DOCTYPE html>
<meta name = "viewport" content="width = device-width, initial-scale=1.0">
<html>
    <head>
        <title>Scheduler V1</title>
        <link rel="stylesheet" media="all" href="../resources/styles/styles.css">
        <link rel="shortcut icon" href="" type="image/x-icon">
    </head>

    <body>
        <div class="sandbox">
            <div class="sandbox-item left">
                <div class="sandbox-left_toolbar">
                    <!-- CODE BLOCK FOR ADD BUTTON -->
                    <div class="toolbar-addbt" id="add-button">
                        <div class="addbt vertical-line"></div>
                        <div class="addbt horizontal-line"></div>
                    </div>
                    <!-- CODE BLOCK FOR HISTORY BUTTON -->
                    <a href="history.html" target="_blank">
                        <div class="toolbar-history">
                            <div class="histbt face"></div>
                            <div class="histbt arrow_box">
                                <div class="arrow"></div>
                            </div>
                            <div class="histbt hand1"></div>
                            <div class="histbt hand2"></div>
                        </div>
                    </a>
                    <!-- CODE BLOCK FOR CREDENTIALS DISPLAY -->
                    <div class="toolbar-credentials">
                        <p id="username">Juan dela Cruz</p>
                        <a href="">logout</a>
                    </div>
                </div>
                <div class="sandbox-left_list">
                    <div class="list-item">
                        <div class="post-preview">
                            <div class="preview text">
                                 <?php
                                        $sql="SELECT caption FROM content WHERE ID=1";
                                        $result=$conn->query($sql);
                                        while($row = $result->fetch_assoc())
                                        echo $row["caption"];   
                                ?>
                            </div>
                            <div class="preview image">
                                <?php
                                        $sql="SELECT image FROM content WHERE ID=1";
                                        $result=$conn->query($sql);
                                        while($row = $result->fetch_assoc())
                                        echo $row["image"]; 
                                ?> 
                            </div>
                        </div>
                        <div class="post-interact">
                            <div class="interact schedule">
                                <div class="schedule-icon">
                                    <div class="icon_cal spring left-spr"></div>
                                    <div class="icon_cal spring right-spr"></div>
                                    <div class="icon_cal cal-face"></div>
                                    <div class="icon_cal cal-head"></div>
                                </div>
                                <div class="schedule-text">
                                    <p id="schedule"></p>
                                    <?php 
                                     // 'name' => '{"name": "'.str_repeat("a", 1000).'"}' // <-- OK
                                        $sql="SELECT dateToPost,hour,minute,daytype FROM content WHERE ID=1";
                                        $result=$conn->query($sql);
                                        while($row = $result->fetch_assoc())
                                        echo $row["dateToPost"];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT HEMISPHERE OF THE INTERFACE -->
            <div class="sandbox-item right">
                <!-- DELETE POP-UP -->
                <div class="sandbox-popup confirm-delete" id="confirm-delete">
                    <div class="popup_dialog delete-post">
                        <p>Delete post?</p>
                        <div class="dialog-button_box">
                            <div class="decide_bt" id="yes" onclick="">Delete</div>
                            <div class="decide_bt" id="no" onclick="deletePopup.style.display = 'none';">Keep</div>
                        </div>
                    </div>
                </div>  

                <div class="empty-prompt">
                    <div class="empty-prompt_icon">
                        <div class="icon circle"></div>
                        <div class="icon dot"></div>
                        <div class="icon body"></div>
                    </div>
                    <p>Click an item to see its complete description.</p>
                </div>

                <!-- COMPOSITION FORM -->
                <div class="modal-pages add-entry" id="adding-form" enctype="multipart/form-data">
                    <div class = "sandbox-modal sandbox-modal_adding">
                        <h2>Compose your post</h2>
                        <div class="fields-box">
                            <form action="add-content.php" method="post" id="compose-post">
                                <div class="field-item_box input_box">
                                    <p class="input-text">Contents</p>
                                    <textarea name="caption" id="caption" cols="30" rows="5" placeholder="Your caption here..."></textarea>
                                    <label class = "img-add_box">
                                        <div class="img-upload" >
                                            <div class="addbt vertical-line add-img_icon"></div>
                                            <div class="addbt horizontal-line add-img_icon"></div>
                                            add images
                                            <input type="file" name="image[]" id="image" scr ="#" accept="image/*" onchange="readURL(this);" multiple />
                                        </div>
                                        <div class="img-prev_box" id="img-preview_box">
                                            <img id="blah" src="../resources/images/no-img.png" alt="your image" />
                                            <p>no image selected</p>
                                            <!-- PREVIEWS ARE SHOWN HERE -->
                                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                            <script>
                                                 $(function () {
                                                        $("#image").change(function () {
                                                            if (typeof (FileReader) != "undefined") {
                                                                var dvPreview = $("#img-preview_box");
                                                                dvPreview.html("");
                                                                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                                                                $($(this)[0].files).each(function () {
                                                                    var file = $(this);
                                                                    if (regex.test(file[0].name.toLowerCase())) {
                                                                        var reader = new FileReader();
                                                                        reader.onload = function (e) {
                                                                            var img = $("<img />");
                                                                            img.attr("style", "height:100px;width: 100px");
                                                                            img.attr("src", e.target.result);
                                                                            dvPreview.append(img);
                                                                        }
                                                                        reader.readAsDataURL(file[0]);
                                                                    } else {
                                                                        alert(file[0].name + " is not a valid image file.");
                                                                        dvPreview.html("");
                                                                        return false;
                                                                    }
                                                                });
                                                            }/* else {
                                                                alert("This browser does not support HTML5 FileReader.");
                                                            }*/
                                                        });
                                                    });
                                            </script>
                                            
                                        </div>
                                    </label>
                                </div>

                                <div class="field-item_box select_box" name="groups">
                                    <p class="input-text">Select pages and groups</p>
                                    <div class="pages-list" name="groups">
                                        <!-- API CHUCHU codes here -->
                                    </div>
                                </div>

                                <div class="field-item_box">
                                    <p class="input-text">Schedule</p>
                                    <input type="date" name="date_schedule">
                                    <input type="number" name="hour" placeholder="hh" max="12">
                                    <input type="number" name="minute" placeholder="mm" max="59">
                                    <select name="type_of_day">
                                        <option value="AM" selected>am</option>
                                        <option value="PM">pm</option>
                                    </select>
                                </div>
                               
                                <button type="submit" id="schedulebt" name="submit">Schedule post</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- POST EDITING FORM -->

                <div class="modal-pages edit-entry" id="editing-form">
                    <div class = "sandbox-modal sandbox-modal_editing">
                        <h2>Edit composition</h2>
                        <div class="fields-box">
                            <form action="edit-content.php" method="post" id="compose-post">
                                <div class="field-item_box input_box">
                                    <p class="input-text">Contents</p>
                                    <textarea name="update_caption" id="caption" cols="30" rows="5" value="<?php echo $caption;?>" placeholder="Your caption here..."></textarea>
                                    <label class = "img-add_box" name="image" >
                                        <div class="img-upload" >
                                            <div class="addbt vertical-line add-img_icon"></div>
                                            <div class="addbt horizontal-line add-img_icon"></div>
                                            add images
                                            <input type="file" name="image" id="add-img-input" accept="image/*" > value="<?php echo $update_image;?>">
                                        </div>
                                        <div class="img-prev_box" id="img-prev_box">
                                            <!-- PREVIEWS ARE SHOWN HERE -->
                                        </div>
                                    </label>
                                </div>

                                <div class="field-item_box select_box">
                                    <p class="input-text" name="groups" value="<?php echo $update_groups;?>">Select pages and groups</p>
                                    <div class="pages-list" >
                                        <!-- API CHUCHU codes here -->
                                    </div>
                                </div>

                                <div class="field-item_box">
                                    <p class="input-text">Schedule</p>
                                    <input type="date" name="date_schedule" value="<?php echo $update_date_schedule;?>">
                                    <input type="number" name="hour" value="<?php echo $update_hour;?>"placeholder="hh" max="12">
                                    <input type="number" name="minute" value="<?php echo $update_minute;?>" placeholder="mm" max="59">
                                    <select name="type_of_day" value="<?php echo $update_type_of_day;?>">
                                        <option value="AM" selected>AM</option>
                                        <option value="PM">PM</option>
                                    </select>
                                </div>
                                <input type="hidden" name="content_id" value=<?php echo $_GET['content_id'];?>>
                                <button type="submit" id="schedulebt" name="edit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- DESCRIPTION MODAL -->
                <div class="modal-pages description-entry" id="post-description">
                    <div class="sched-ribbon">
                        <div class="schedule-icon ribbon-cal">
                            <div class="icon_ribbon-cal spring left-spr"></div>
                            <div class="icon_ribbon-cal spring right-spr"></div>
                            <div class="icon_ribbon-cal cal-face"></div>
                            <div class="icon_ribbon-cal cal-head"></div>
                        </div>
                        <p class="ribbon_text">Scheduled posting on <b>July 1, 2019</b> at <b>8:00 AM</b></p>
                    </div>
                    <div class = "options-sandbox">
                        <a id="edit-button" onclick="openEditForm();"> <!-- EDIT BUTTON -->
                            <div class="option-box edit">
                                <div class="option_logo logo-pen">
                                    <div class="pen_top"></div>
                                    <div class="pen_body"></div>
                                    <div class="pen_tip"></div>
                                </div>
                                <span>Edit</span>
                            </div>
                        </a>
                        <a id="delete-button" onclick="confirmDelete();"> <!-- DELETE BUTTON -->
                            <div class="option-box delete">
                                <div class="option_logo logo-stop">
                                    <div class="stop_circle"></div>
                                    <div class="stop_line"></div>
                                </div>
                                <span>Delete</span>
                            </div>
                        </a>
                    </div>
                    <div class="sandbox-modal">
                        <div class = "description_contain">
                            <div class="banner-box">
                                <!-- IMAGE HERE -->
                            </div>
                            <div class="caption-box">

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor efficitur dictum. Vivamus sit amet purus enim. Donec feugiat risus sed orci rhoncus, tempor porttitor sapien tincidunt. Fusce a egestas lorem. Sed maximus nulla ante. Pellentesque pulvinar aliquet viverra. In egestas, lacus a ornare consequat, lacus eros imperdiet ipsum, sit amet convallis nisl tortor eget lectus. Mauris non semper augue.</p>

                                <p>Vivamus commodo risus leo, eu volutpat nunc facilisis non. Integer ullamcorper convallis auctor. Cras eu purus quis lacus convallis ullamcorper sit amet non elit. Cras id felis dictum, eleifend sem nec, porta ante. Vivamus ac aliquet neque, id consectetur orci. Phasellus eget sem id nisl finibus mollis. Fusce non consectetur neque, et feugiat massa. In fringilla quis ipsum vel tristique. Donec aliquam urna vehicula lacus bibendum, sit amet consequat dolor tincidunt. Nulla eget odio at elit congue iaculis. Nam fermentum ultricies mauris vel aliquet. Sed malesuada vitae turpis feugiat tincidunt. Nulla fermentum nec velit eget maximus.</p>

                                <p>Morbi consectetur in urna vel hendrerit. Vivamus finibus posuere tellus eget aliquam. Nunc imperdiet, ex tempor gravida vulputate, ipsum ligula vehicula ligula, eget sodales odio ex ac dolor. Aliquam dapibus enim at velit venenatis, ut rutrum nulla sagittis. Pellentesque mollis euismod elit eget venenatis. Fusce id purus et orci semper consequat. Nam ligula ante, lacinia sed elementum non, cursus vel lorem. Phasellus congue sed tellus vitae egestas. Nunc tempus, dolor eget pharetra placerat, mi sem tincidunt leo, quis aliquet nisi dolor et lacus. Aliquam erat volutpat. Nunc a diam quis turpis luctus vulputate. Ut eu ipsum nulla. Vestibulum blandit ornare viverra. Aliquam condimentum lorem sapien, vel semper lectus bibendum sit amet.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CLOSE BUTTON -->
            <div class="close-button_box" id="close-button">
                <div class="close-button">
                    <div class="ex left-slant"></div>
                    <div class="ex right-slant"></div>
                </div>
            </div>
        </div>

        <script src="../resources/scripts/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>