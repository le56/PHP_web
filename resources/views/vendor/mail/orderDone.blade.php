<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Details order</h2>

<table>
  <tr>
    <th>Product name</th>
    <th>Quantity</th>
    <th>Total price</th>
  </tr>
  @foreach ($carts as $item)
  <tr>
    <td>{{$item->product->title}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->totalPrice}}</td>
  </tr>
  @endforeach

</table>

</body>
</html>

