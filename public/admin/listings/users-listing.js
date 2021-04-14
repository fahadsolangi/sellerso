const tablename='users';const ydebugger=false;var ytabled;
var _hashed = window.location.hash;
if(!_hashed){
    notify('0','Need clauses to generate users');
    throw new Error("Something went badly wrong!");
}
_hashed = _hashed.replace('#','');
var _myFilters = _hashed.split('&');
var total_filters = [];
var default_type = '1';
var extra_btn = '';
_myFilters.forEach((a,e)=>{
    var _where = {
        col:"",
        condition:"=",
        value:"",
    };
    if(a.indexOf('=')>0){
        var _fil = a.split('=')
        _where.col = _fil[0];
        _where.condition = '=';
        _where.value = "'"+_fil[1]+"'";
        if(_fil[0]=='role'){
            default_type=_fil[1];
           
        }
        if(e==0){
            let _col = _fil[0];
            total_filters={ [_col] :"='"+_fil[1]+"'",and:[]};
        } else {
            total_filters.and.push(_where);
        }
    }
});
 if(default_type == 1)
    // extra_btn = '<button onclick="redirectligin(this)" data-toggle="tooltip" class="btn btn-outline-warning btn--icon" data-placement="top" title="Login" data-original-title="Login"><i class="zmdi zmdi-account-o zmdi-hc-fw"></i></button>\
    //     <button data-toggle="tooltip" onclick="supplierProducts(this)" class="btn btn-outline-info btn--icon" data-placement="top" title="Products"><i class="zmdi zmdi-local-parking zmdi-hc-fw"></i></button>';

/*Setting up menus and headings*/
var heading = '';
if(default_type=='1'){
    heading = 'Supplier Management';
}
if(default_type=='2'){
    heading = 'Customer Management';
}

document.querySelector('title').innerHTML = heading+' Listing';
document.getElementsByClassName('card-title')[0].children[0].innerText=heading;
document.getElementsByClassName('content__title')[0].children[0].innerText=heading+' Listing';
document.getElementsByClassName(default_type+'_user')[0].classList = 'navigation__active';
/*Setting up menus and headings End*/
/*When you want to use FAST CRUD of ytable and you have used joins in the listing use 
type:'ignore' 
in columns which are being shown by the join and not the part of , 
*/
(async () => {
        //var TYPEDATA = default_type == 1 ?await getAjaxTable('categories','id','category_name','category_type=1') : [];
        //var TYPEDATA = default_type == 1 ? await getFlagDropdown('CATEGORYTYPE') : [];
    ytabled = new ytable(tablename,[
        {
            column:'id',
            name:'ID',
            type:'hidden',
        }
        // ,{
        //     column:'brand',
        //     name:'Brands',
        //     type:default_type == 1 ? 'select2' : 'ignore',
        //     typeData:TYPEDATA,
        //     hiddenInList:true,
        //     callback:'setDropdownValue'
        // }
        // ,{
            // column:'category',
            // name:'Category',
            // type:'select2',
            // typeData:[],
            // hiddenInList:true,
            // callback:'setDropdownValue',
        // }
       
        ,{
            column:'first_name',
            name:'First Name',
            type:'text',
        }
        ,{
            column:'last_name',
            name:'Last Name',
            type:'text',
        }
        ,{
            column:'email',
            name:'Email',
            type:'text',
        }
        /*,{
            column:'password',
            name:'Password',
            type:'text',
            hiddenInList:true,
        }*/
        ,{
            column:'phone',
            name:'Phone',
            type:'text',
        }
        ,{
            column:'zipcode',
            name:'Postal Code',
            type:'text',
            hiddenInList:true,
        }
        ,{
            column:'address',
            name:'Address',
            type:'textarea',
            hiddenInList:true,
        },{
            column:'role',
            name:'role',
            type:'hidden',
            _default: default_type,
            hiddenInList:true,
        }
         ,{
            column:'is_active',
            name:'Is Active?',
            callback:'is_active',
            type:'checkbox',
        }
        
        
        
       
    ],
    [
         //{ "left join" : "(select id as img_id,ref_id,table_name as img_tblename,img_path as table_notes_image from imagetable where imagetable.table_name='table_notes' and imagetable.type='1') as imagetable on  imagetable.ref_id=table_notes.id" } ,
         //{ "left join" : "(select id as img_id_thumb,ref_id as thumb_ref_id,table_name as img_tblename_thumb,img_path as table_notes_thumb_image from imagetable where imagetable.table_name='table_notes_thumb' and imagetable.type='1') as imagetable_thumb on  imagetable_thumb.thumb_ref_id=table_notes.id" } ,
    ],
    [
        
        extra_btn,
        
        'editFast',
        'viewFast',
        'delete',
    ],'.ytable',{
        "where":total_filters,
        "order by" : "id desc",
        // "group by" : "table_notes.id",
    },ydebugger);
    ytabled.autoCallbacksonBuild.push('turnOnDblClickCopyyTable');
window.addEventListener('ytable_beforeRow', function (e) {
    //console.log(e.detail);
    //var olddata = ytabled.currentData[e.detail.dataIndex].id;
    //ytabled.currentData[e.detail.dataIndex].id = '<a href="javscript:void(0)">'+olddata+'</a>';
});
window.addEventListener('ytable_afterRow', function (e) {
    //console.log(e.detail);
    /*here you will get the unique index of every row added in the ytable*/
    $('[data-toggle="tooltip"]').tooltip();
});
window.addEventListener('ytable_columnAdded_{columnname}', function (e) {
    /*Here you get specific column event only you can defnie events like 
        ytable_columnAdded_id
        ytable_columnAdded_name
        ytable_columnAdded_email
        ytable_columnAdded_updatedAt

    and then update only on those specific columns , this event will fire whenever the column is added in ytable
    */
    //console.log(e.detail);
    //ytabled.currentData[e.detail.dataIndex].id = 'TESTING UPDATE';
});
window.addEventListener('fastCrudSuccess', function (e) {
    /*Fires after you update/create record and that record is successfully updated/created 
    e.datail = response
    */
});
window.addEventListener('fastCrudFailed', function (e) {
    /*Fires after you try to update/create record and it fails either in validation or for some other reasons 
    e.datail = response
    */
});
window.onhashchange = ()=> { window.location.reload() };
window.addEventListener('fastCrudFromRendered', function (e) {
    /*Fires after your popup form has been rendered , if you want any function to work or event to bind
    on any input, from here you can do that...
    e.detail have the data of a row you've selected to edit, 
    if you've created a new record e.detail will be undefined
    console.log(e.detail);
    */
     if(e.detail){
        /*
        getAjaxTable('categories','id','category_name','IFNULL(category_type,0)='+e.detail.category_type).then(function(q){
            q[0] = 'Please Select';
            var _html = '';
            for(data in q){
                q[data]
                _html+='<option value="'+data+'">'+q[data]+'</option>';
            }
            $('[name="category"]').html(_html);
            return q;
        }).then(function(f){
            if(e.detail.category){
                console.log(e.detail.category)
                $('[name="category"]').val(e.detail.category);
                $('[name="category"]').select2();
            }
        });
        */
    }
    /*
    $('[name="category_type"]').change(async function(){
        var _data = await getAjaxTable('categories','id','category_name','IFNULL(category_type,0)='+$(this).val());
        _data[0] = 'Please Select';
        var _html = '';
        for(data in _data){
            _data[data]
            _html+='<option value="'+data+'">'+_data[data]+'</option>';
        }
        $('[name="category"]').html(_html);
    });
    */
});
})();
var enableFastCrud = ()=>{
    document.getElementsByClassName('ytable-addrecord')[0].addEventListener('click',(e)=>{
        $('#ytable-FastCRUD').modal('toggle');
        document.getElementById('ytable_table').value=tablename;
        document.getElementById('unique_column').value=ytabled.uniqueCol;
        fastCRUDForm(ytabled);
    })
}
/*
var redirecttoTarget = (obj)=>{
    var _id = $(obj).parent().parent().children('td').eq(0).html();
    window.location = base_url('/adminiy/listing/team_managements-listing#coach_id='+_id);
}
*/
function supplierProducts(obj){
    var _id = $(obj).parent().parent().data('ytablerowid');
    var _url = base_url('adminiy/listing/products-listing#user_id='+_id);
    window.open(_url);
    //window.location=_url
}
function redirectligin(obj){
    var _id=$(obj).parent().parent().children('td').eq(0).html();
    window.open(base_url(`adminiy/login-by-id/${_id}`));
    //window.location.href=base_url(`adminiy/login-by-id/${_id}`);
}