// =========  ****************  ================
function burl(){
  return 'http://localhost/vvv_exam/';
}
// ============= to set add new qus: txt/img =========

function set_qbox(qt){
  if(qt === 'T') {
    document.getElementById('Tqbox').style.display = 'block';
    document.getElementById('Iqbox').style.display = 'none';
    document.getElementById('t1').value = 'T';
  } else {
    document.getElementById('Iqbox').style.display = 'block';
    document.getElementById('Tqbox').style.display = 'none';
    document.getElementById('t2').value = 'I';
  }
}

// ============= to get topics with subj_id ======

function get_stopics(subj){
  b_url=burl();
$(".tcls").remove();
  $.get(b_url+"jqfunctions/get_topics/",{subj_id:subj},function(response){
                   if(response){
                        $(".tcls").remove();
                        $("#topic").append(response);
                   }
                });
}

// ============= to get topics2 with subj_id =======

function get_stopics2(subj){
$(".tcls").remove();
  b_url=burl(); 
  $.get(b_url+"jqfunctions/get_topics/",{subj_id:subj},function(response){
                    if(response){
                        $(".tcls").remove();
                        $("#topic2").append(response);
                    }
                });
}

// ============= to update question =======

function updt_ques(qid, col, val){
  b_url=burl(); 
  $.get(b_url+"jqfunctions/updt_ques/",{qid:qid, col:col, val:val},function(response){
                    if(response){
                      //alert(response);
                    }
                });
}

// ************** to get batches with course_id*******************

function get_cbatches(subj){
$(".tcls").remove();
  b_url=burl(); 
  $.get(b_url+"jqfunctions/get_cbatches/",{subj_id:subj},function(response){
                   if(response){
                        $(".tcls").remove();
                        $("#batch").append(response);
                   }
                });
}

// ************** to get branches with qlfy_id*******************

function get_qbranches(qid){
  b_url=burl();
$(".tcls").remove();
  $.get(b_url+"jqfunctions/get_qbranches/",{qid:qid},function(response){
                   if(response){
                        $(".qcls").remove();
                        $("#qbranch").append(response);
                   }
                });
}

// ---------------------


function get_qbranches2(qid){
$(".qcls2").remove();
  b_url=burl(); 
  $.get(b_url+"jqfunctions/get_qbranches2/",{qid:qid},function(response){
                   if(response){
                        $(".qcls2").remove();
                        $("#qbranch2").append(response);
                   }
                });
}

// ************** to get catg projs with cat_id*******************

function get_cprojects(pcid){
$(".tcls").remove();
  b_url=burl(); 
  $.get(b_url+"jqfunctions/get_cprojects/",{pcid:pcid},function(response){
                   if(response){
                        $(".pcls").remove();
                        $("#cproj").append(response);
                   }
                });
}




