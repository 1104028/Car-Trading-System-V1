﻿@extends('layouts.admin')

@section('content')

<table class="table table-bordered table-striped">
    <tr>
        <th id="table-header">
            @Html.DisplayNameFor(model => model.ModelName)
        </th>

        <th id="table-header">
            @Html.DisplayNameFor(model => model.YearOfRelease)
        </th>
        <th id="table-header">
            @Html.DisplayNameFor(model => model.Price)
        </th>
        <th id="table-header">
            @Html.DisplayNameFor(model => model.BodyStyle)
        </th>

        <th id="table-header">Operations</th>
    </tr>

    @foreach (var item in Model)
    {
        <tr>
            <td id="table-header">
                @Html.DisplayFor(modelItem => item.ModelName)
            </td>

            <td id="table-header">
                @Html.DisplayFor(modelItem => item.YearOfRelease)
            </td>
            <td id="table-header">
                @Html.DisplayFor(modelItem => item.Price)
            </td>
            <td id="table-header">
                @Html.DisplayFor(modelItem => item.BodyType.BodyTypeName)
            </td>

            <td id="table-header">
                @Html.ActionLink("Edit", "Edit", new { id = item.ModelID }) |
                @Html.ActionLink("Details", "Details", new { id = item.ModelID }) |
                @Html.ActionLink("Delete", "Delete", new { id = item.ModelID })
            </td>
        </tr>
    }

    @Html.ActionLink("Generate Pdf", "GeneratePDF")
</table>
@endsection
