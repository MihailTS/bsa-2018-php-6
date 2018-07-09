<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Currency List</title>

    <style>
        .currency-title{
            text-align:center;
        }
        .currency-table{
            margin:0 auto;
        }
        .currency-table__head{
            font-weight: bold;
        }
        .currency-table__head th{
            padding:2px 20px;
        }
        .currency-table__row td{
            padding:20px
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="currency-title">Currency List</h1>
        <table class="currency-table" border="1" cellspacing="0" cellpadding="0">
            <tr class="currency-table__head">
                <th>Active</th>
                <th>Name</th>
                <th>Ticker</th>
                <th>Actual course</th>
                <th>Update time</th>
            </tr>
            @foreach($currencies as $currency)
                <tr class="currency-table__row">
                    <td>
                        <input type="checkbox" {{$currency->isActive()?'checked':''}}>
                    </td>
                    <td>
                        {{$currency->getName()}}
                    </td>
                    <td>
                        {{$currency->getShortName()}}
                    </td>
                    <td>
                        {{$currency->getActualCourse()}}
                    </td>
                    <td>
                        {{$currency->getActualCourseDate()->format('d.m.Y H:i:s')}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
