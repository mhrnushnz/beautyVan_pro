<script src="{{asset('admin/asset/scripts/submenu.js')}}"></script>


<script>
    function toast(){
        return{visible:false, timer:null, title:'', message:'', type:'success',
            show(data){
                clearTimeout(this.timer);
                this.visible=true;
                this.type=data.type ?? 'success';
                this.title=data.title ?? '';
                this.message=data.message ?? '';
                this.timer=setTimeout(()=>{
                    this.hide();
                },3000);
            },
            hide(){clearTimeout(this.timer);this.visible=false;}
        }
    }
</script>
