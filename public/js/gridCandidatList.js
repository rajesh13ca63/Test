$(document).ready(function(){
    
    $("#gridCandidateList").bootgrid({
      
        ajax: true,
        post: function ()
        {
            return {
                id: "b0df282a-0d67-40e5-8558-c9e93b7befed",
                '_token': $('meta[name="csrf-token"]').attr('content')
            };
        },
        url: '/getCandidateList',
       
        //selection: true,
        //multiSelect: true,
        rowSelect: true,                                   
        keepSelection: true,
        rowCount:[10,25,50],
        
        formatters: {
            "commands": function(column, row)
            {
                return "<a type=\"button\" class=\"btn btn-xs btn-default command-edit btn-primary\"  data-row-id=\"" +row.id + "\" + href=\"" + '/update? id='+ row.id + "\"><span class=\"fa fa-pencil\"></span></a> " + 
                       "<a type=\"button\" class=\"btn btn-xs btn-default command-user btn-primary\"  data-row-id=\"" +row.id + "\" + href=\"" + '/getstudentdetails? id='+ row.id + "\"><span class=\"fa fa-user\"></span></a>" +
                       "<a type=\"button\" class=\"btn btn-xs btn-default command-delete btn-danger\" data-row-id=\"" +row.id+ "\" + href=\"" + '/deleteStudentRecords? id='+ row.id + "\"><span class=\"fa fa-trash-o\"></span></a>";
                    
            }
        }
    });
    
    $("#gridStudentList").bootgrid({
      caseSensitive: false
    });
    
  // $('#myModal').modal({
   // backdrop: 'static',
    //keyboard: false
   // });
});