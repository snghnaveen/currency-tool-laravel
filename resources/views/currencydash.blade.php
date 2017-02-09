@extends('base')
@section('css')
    .area1
    {
    margin:5%
    margin: 100px 150px 100px 80px;
    }
    .area2
    {
    margin: 25px 22px 25px 22px;
    border:1px;
    }
    /* The alert message box */
    .alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
    }

    /* The close button */
    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
    color: black;
    }


@stop
@section('content')

    <div class="alert" style="display: none;" id="alertBox">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Please select correct values.
    </div>
    <form class="form-group" name="cc" action="{{url('result')}}" method="get" id="cc" onsubmit="return validate()">
        <div class=area1>
            <select name="from" id="from" class="form-control">
                <option selected disabled>From Currency</option>
                @foreach($data as $item)
                    <option value={{ $item }}>{{ $item }}</option>
                @endforeach
            </select>
            <div class="divider"></div>
            <select name="to" id="to" class="form-control">
                <option selected disabled>To Currency</option>
                @foreach($data as $item)
                    <option value={{ $item }}>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="area2">
            <input type="submit" class="btn btn-primary" value="Get Result">
        </div>
        <script>
            var cc = document.getElementById('cc');
            var str = "API EndPoints for Currency " + window.location.hostname + "/currency/api/";
            var result = str.link('/api/');
            cc.innerHTML = cc.innerHTML + result;
        </script>
    </form>

@stop
@section('javascriptcode')
    <script type="text/javascript">
        function validate() {
            var fromOptionElement = document.getElementById("from");
            var fromOptionValue = fromOptionElement.options[fromOptionElement.selectedIndex].value;
            var toOptionElement = document.getElementById("to");
            var toOptionValue = toOptionElement.options[toOptionElement.selectedIndex].value;
            if (fromOptionValue == "From Currency") {
                document.getElementById("alertBox").style.display = "block";
                return false;
            }
            if (toOptionValue == "To Currency") {
                return false;
            }
            return fromOptionValue != toOptionValue;
        }
    </script>
@stop