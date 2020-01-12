<!DOCTYPE html>
<html>
<head>
  <title>CV</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <style type="text/css">
      .logo{

        margin-left: 24rem;

      }
    </style>
</head>
<body>
     
<div class="container justify-content-center">
  <br><br>
  <div class="row" style="cursor: pointer;">
     <div class="col-lg-3 col-md-3 col-xs-4 col-sm-4">
       <img src="/img/logo3.png" alt="">
    </div>
     <div class="col-lg-7 col-md-7 col-xs-4 col-sm-4">
     </div>
    <div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">
       <a id="basic" class="button button-primary"><img src="https://img.icons8.com/color/50/000000/print.png" class="img">
        <b>Print your cv</b></a> 
    </div>
  </div><br>
<table bgcolor="#24324a" width='100%' cellpadding="20pt" align="center" id="table" style="page-break-inside:auto;">
    <tr>
        <td>
        <img src="/photo/{{$user_infos[0]->photo}}"  height="150" width="150" align="middle" style="width: 125px;">
        </td>
        <td><img src="/img/cv/icon1.png" width="45" height="45" /> <font size="4" color="white">{{$user_infos[0]->name}}</font></td> 
        <td><img src="/img/cv/icon2.png" width="35" height="35" /> <font size="4" color="white">{{$user_infos[0]->email}}</font></td> 
        <td><img src="/img/cv/icon3.png" width="40" height="40" /> <font size="4" color="white">{{$user_infos[0]->phone}}</font></td>
        <td><img src="/img/cv/icon4.png" width="40" height="40" /> <font size="4" color="white">{{$user_infos[0]->gender}}</font></td>
    </tr>  
</table>
<table bgcolor="#f5f5f5" align="center" width='100%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;">
     <tr>
       <td>
       <font size="5"> Basic Informations </font>
     </td>
    </tr>  
    <tr>
        <td><img src="/img/cv/card.png" width="35" height="35"/> <font style=" font-size: 18px;">{{$user_infos[0]->nrc}}</font></td>
        <td><img src="/img/cv/icon11.png" width="35" height="35" /> <font  style=" font-size: 18px;">{{$user_infos[0]->race}}
        </font></td> 
        <td><img src="/img/cv/pray.png" width="35" height="35" /> <font  style=" font-size: 18px;">{{$user_infos[0]->religious}}
        </font></td>  
    </tr>  
     <tr>
        <td><img src="/img/cv/town.png" width="40" height="40" /> <font size="4">{{$user_infos[0]->native_town}}
        </font></td>
        <td><img src="/img/cv/dateofbirth.png" width="33" height="33" /> <font size="4">{{$user_infos[0]->date_of_birth}}
        </font></td>
        <td><img src="/img/cv/weight.png" width="35" height="35"/> <font size="4">{{$user_infos[0]->weight}}</font></td>   
    </tr>  

     <tr>
        <td><img src="/img/cv/height.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->height}}
        </font></td> 
        <td><img src="/img/cv/icon17.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->marital_status}}
        </font></td> 
        <td><img src="/img/cv/icon18.png" width="45" height="40" /> <font size="4">{{$user_infos[0]->health}}
        </font></td>
         
        
    </tr>  
    <tr>
      <td><img src="/img/cv/icon19.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->emergency_contact_name}}
        </font></td>
        <td><img src="/img/cv/icon20.png" width="35" height="35"/> <font size="4">{{$user_infos[0]->emergency_phone}}</font></td>
        <td><img src="/img/cv/icon21.png" width="33" height="33" /> <font size="4">{{$user_infos[0]->relation_with_econtact}}
        </font></td> 
    </tr>
    <tr>
      <td><img src="/img/cv/icon22.png" width="42" height="42" /> <font size="4">Mandalay
        </font></td>
      <td colspan="2"><img src="/img/cv/icon23.png" width="40" height="40" /> <font size="4">{{$user_infos[0]->address}},ChanMyaTharZi,Mandalay
        </font></td>
    </tr>
    <tr style="border-top: 1px solid silver;"></tr>

</table>

<table bgcolor="#f5f5f5" align="center" width='100%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;">
  <tr>
       <td>
      <font size="5">  CV Informations </font>
     </td>
    </tr> 

    <tr>
        <td><img src="/img/cv/icon24.png" width="32" height="32"/> <font size="4">{{$user_infos[0]->job_position}}</font></td>
        <td><img src="/img/cv/icon7.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->job_category}}
        </font></td> 
        <td><img src="/img/cv/icon8.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->experlevel}}
        </font></td> 
    </tr> 
    <tr>
        <td><img src="/img/cv/icon9.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->education}}MMK
        </font></td>
        <td><img src="/img/cv/icon6.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->expected_salary}}
        </font></td>
        <td><img src="/img/cv/icon25.png" width="40" height="40"/> <font size="4">{{$user_infos[0]->bond_with_prev_company}} bond with previous company</font></td>
    </tr> 
    <tr>
       <td><img src="/img/cv/icon26.png" width="35" height="35" /> <font size="4">{{$user_infos[0]->limit_jobs_with_prev_company}} limit jobs with previous company
        </font></td>
       <td><img src="/img/cv/icon32.png" width="40" height="40"/> <font size="4"> full time
        </font></td>
       <td><img src="/img/cv/icon33.png" width="40" height="40"/> <font size="4"> Find jobs
        </font></td>
    </tr>
    <tr style="border-top: 1px solid silver;"></tr>
     
</table>
@if(count($work_exps) > 0)

<table bgcolor="#f5f5f5" align="center" width='100%' cellpadding="20pt"  border="0" id="table" style="page-break-inside:auto;">
  <tr>
       <td>
        <font size="5"> Work Experiences </font>
     </td>
    </tr> 
    @foreach($work_exps as $work_exp)
    <tr>
      <td colspan="3">
        <img src="/img/cv/icon34.png" width="32" height="32" /> <font size="4">{{$work_exp->star_date }} to {{$work_exp->end_date}}
        </font>
      </td>
    </tr>
    <tr>
        <td><img src="/img/cv/icon24.png" width="32" height="32"/> <font size="4">{{$work_exp->job_postion}}</font></td>
        <td><img src="/img/cv/icon7.png" width="35" height="35" /> <font size="4">{{$work_exp->job_cat_name}}
        </font></td> 
        <td><img src="/img/cv/icon8.png" width="35" height="35" /> <font size="4">{{$work_exp->job_exp_name}}
        </font></td>
    </tr> 
    <tr>
     <td colspan="2"><img src="/img/cv/icon28.png" width="32" height="32"/> <font size="3">{{$work_exp->left_reason}}</font></td>
     <td><img src="/img/cv/icon29.png" width="35" height="35" /> <font size="3">{{$work_exp->proof}}
    </tr>
    <tr style="border-top: 1px dashed silver;"></tr>
    @endforeach
    <tr style="border-top: 1px solid silver;"></tr>

</table>
@endif
@if(count($trains) > 0)
<table bgcolor="#f5f5f5" align="center" width='100%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;" >
  <tr>
       <td>
         <font size="5"> Training Certificates </font>
      </td>
    </tr> 
    @foreach($trains as $train)
    <tr>
        <td colspan="3"><img src="/img/cv/icon30.png" width="32" height="32"/> <font size="4">{{$train->name}}</font></td>
    </tr> 
    <tr>
       <td><img src="/img/cv/icon31.png" width="35" height="35" /> <font size="4">{{$train->university}}
        </font></td> 
      <td><img src="/img/cv/icon32.png" width="35" height="35" /> <font size="4">{{$train->time_limit}}
        </font></td>
      <td><img src="/img/cv/icon27.png" width="35" height="35" /> <font size="4">{{$train->start_date }} to {{$train->end_date}}
        </font></td>
    </tr>
    <tr style="border-top: 1px dashed silver;"></tr>
    @endforeach
     
</table>
@endif
</div>
<br>
<br>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/printThis.js"></script>
<script>
$(document).ready(function() {

  // $("a.jquery-word-export").click(function (events) {
  //           $("#page-content").wordExport();
  //       });

  $('#basic').on("click", function () {
       $('#table,#tr').printThis();
    });
   });
   </script>
</body>
</html>