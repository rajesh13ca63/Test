@extends('layouts.applist')

@section('content')
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Candidate Records</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <!-- Styles -->
        <h2 style="text-align:center">Candidate Records</h2>
        
       <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css">
    
    </head>


<!-- Table -->
    <table id="gridCandidateList" name="gridCandidateList" data-toggle="table" class="table table-striped table-bordered dt-responsive nowrap" aria-disabled="true" cellspacing="0" width="100%">
   
      <thead>
      <tr>
        <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="left" >Id</th>
        <th data-column-id="First_name" data-order="asc" data-header-align="left" data-sortable="true">Candidate Name</th>
        <th data-column-id="Last_name" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-sortable="true">Last Name</th>
        <th data-column-id="Experience" data-css-class="cell" data-header-css-class="column" data-filterable="true" >Experience</th>
        <th data-column-id="Gender" data-header-css-class="column" data-filterable="true">Gender</th>
        <th data-column-id="Dob" data-header-css-class="column" data-filterable="true">DOB</th>
        <th data-column-id="Basic_education" data-header-css-class="column" data-filterable="true">Basic Education</th>
        <th data-column-id="Mobile_no" data-header-css-class="column" data-filterable="true">MobileNo</th>
        <th data-column-id="email" data-formatter="column" data-filterable="true">EmailId</th>
        <th data-column-id="commands" data-visibleInSelection="false" data-formatter="commands" data-sortable="false">Actions</th>
      </tr>
      </thead>
      </table>
      
        <!-- javascript -->
      	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js" ></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
        <script src="{{ URL::asset('js/gridCandidatList.js?version=1.5') }}"></script>
</html>
