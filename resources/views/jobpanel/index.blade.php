<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
        $jstatus=['Started','On processing',"Completed"];
        $jcolor=['#a83232','#3248a8',"#32a852"];
    ?>
    <div class="container-fluid">
        <div class="row">
            @foreach ($joborders as $item)
            @if($item->joborderitems->count()>0)
            <div class="col-md-4 mt-2">
                <div class="card  h-100 w-100 shadow-sm">
                    <p class="p-2 m-0">
                        Order-id : {{$item->id}} |
                        Customer : {{$item->customer->name}}
                        {{-- Received Date : {{$item->order_received_date}}<br>
                        Delivery Date : {{$item->order_delever_date}} --}}
                    </p>

                    <div>
                        <table class="table">
                            <tr>
                                <th>
                                    Particular
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            @foreach ($item->joborderitems as $jitem)
                            <tr>
                                <td>
                                    {{$jitem->particular}}
                                    <span id="status-{{$jitem->id}}"
                                        style="margin-left:10px;font-weight: 700;color:{{$jcolor[$jitem->status]}}">
                                        {{$jstatus[$jitem->status]}}
                                    </span>
                                    <br>
                                    {{$jitem->remark}}
                                </td>
                                <td>
                                    @if($jitem->status<1) <button id="process-{{$jitem->id}}"
                                        onclick="process({{$jitem->id}})" class="btn btn-secondary">Process
                                        </button>
                                        @endif
                                        @if($jitem->status<2) <button id="finish-{{$jitem->id}}"
                                            onclick="finish({{$jitem->id}})" class="btn btn-primary">
                                            finish</button>
                                            @endif

                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script>
        var jcolors=['#a83232','#3248a8',"#32a852"];
        function process(id){
            fetch('/process/'+id)
            .then(response =>{
                    return response.json();
                })
                .then(json=>{
                    if(json==1){
                        var ele=document.getElementById('status-'+id);
                        ele.style.color=jcolors[1];
                        ele.innerText="On Processing"
                        $("#process-"+id).remove();
                    }
                });
        }
        function finish(id){
            fetch('/finish/'+id)
                .then(response =>{
                    return response.json();
                })
                .then(json=>{
                    if(json==1){
                        var ele=document.getElementById('status-'+id);
                        ele.style.color=jcolors[2];
                        ele.innerText="Completed"
                        $("#finish-"+id).remove();
                        $("#process-"+id).remove();
                    }
                });
        }
    </script>
</body>

</html>
