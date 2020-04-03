<form id="scanForm"  style="display:none;" method="POST"   action="{{action('attendencePageController@scanCard') }}"  >
    {{csrf_field()}}
    
    <input type="text" name="stu_id" id="stu_id" />
    <button type="submit">submit</button>
</form>