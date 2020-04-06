<form id="feesForm"  style="display:none;" method="POST"   action="{{action('attendencePageController@studentClasses') }}"  >
    {{csrf_field()}}
    
    <input type="text" name="stu_id" id="stu_id2" />
    <button type="submit">submit</button>
</form>