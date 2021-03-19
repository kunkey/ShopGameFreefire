function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}
var DOCSO=function(){var t=["không","một","hai","ba","bốn","năm","sáu","bảy","tám","chín"],r=function(r,n){var o="",a=Math.floor(r/10),e=r%10;return a>1?(o=" "+t[a]+" mươi",1==e&&(o+=" mốt")):1==a?(o=" mười",1==e&&(o+=" một")):n&&e>0&&(o=" lẻ"),5==e&&a>=1?o+=" lăm":4==e&&a>=1?o+=" tư":(e>1||1==e&&0==a)&&(o+=" "+t[e]),o},n=function(n,o){var a="",e=Math.floor(n/100),n=n%100;return o||e>0?(a=" "+t[e]+" trăm",a+=r(n,!0)):a=r(n,!1),a},o=function(t,r){var o="",a=Math.floor(t/1e6),t=t%1e6;a>0&&(o=n(a,r)+" triệu",r=!0);var e=Math.floor(t/1e3),t=t%1e3;return e>0&&(o+=n(e,r)+" ngàn",r=!0),t>0&&(o+=n(t,r)),o};return{doc:function(r){if(0==r)return t[0];var n="",a="";do ty=r%1e9,r=Math.floor(r/1e9),n=r>0?o(ty,!0)+a+n:o(ty,!1)+a+n,a=" tỷ";while(r>0);return n.trim()}}}();
function bindingURL(idName, idURL) {
    $("#" + idName).on("propertychange change keyup paste input", function(){
        var name = $(this).val();
        var url = boDau(name);
        do {
            url = url.replace(" ", "-");
        }
        while (url.indexOf(" ") > -1);
        do {
            url = url.replace("--", "-");
        }
        while (url.indexOf("--") > -1);

        var oldURL = $("#" + idURL).val();
        if (url.startsWith(oldURL) || oldURL.startsWith(url)) {
            $("#" + idURL).val(url);
        }
    });
   
}
function formatCurrency(number) {
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&.");
    return n2.split('').reverse().join('') + '</br> VNĐ';
}
function StrRight(value, len) {
    return value.substr(value.length - len);
}

function DrawTable(ElementID, data, Fields, fieldSum) {
    var table = '';
    var row = 1;
    $.each(data.Data, function (index, item) {
        table += '<tr>';

        if (item[fieldSum] == 'Tổng cộng') {
            table += '<td>&nbsp</td>';
            for (var i = 0; i < Fields.length; i++) {
                table += '<td><b>' + item[Fields[i]] + '</b></td>';
            }
        } else {
            table += '<td>' + row + '</td>';
            for (var i = 0; i < Fields.length; i++) {
                table += '<td>' + item[Fields[i]] + '</td>';
            }
        }

        $('#' + ElementID).html(table);
       
        table += '</tr>';
        row++;
    });
}

function DrawChart(ElementID, Data, FieldName, FieldValue, Name, Type) {
    //$("#" + ElementID).html('');
    
    $('#' + ElementID).parent().html('<canvas id="'+ElementID+'"></canvas>');
    

    var configLabel = [];
    var configData = [];
    $.each(Data, function (index, item) {
        if (item[FieldName] != 'Tổng cộng') {
            configLabel.push(item[FieldName]);
            configData.push(item[FieldValue]);
        }
        
    });

    config = {
        type: 'bar',
        data: {
            labels: configLabel,
            datasets: [{
                label: "Value",
                data: configData,
                backgroundColor: 'rgba(0, 188, 212, 0.8)'
            }]
        },
        options: {
            responsive: true,
            legend: false
        }
    }
    new Chart(document.getElementById(ElementID).getContext("2d"), config);
}

function boDau(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        return str;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

function MakeFormReadOnly()
{
    $('input').attr('disabled', 'disabled');
    $('input').attr('disabled', true);
    $('select').attr('disabled', true);
    for (instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].setReadOnly(true);


}

function InitUploadFile(id)
{
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var data = null;
    var config = null;
    if (url != '') {
        data = [url];
        config = [{ width: "120px", url: '/Sys_File/DeleteImage/' + key }];
    } else {
        data = [];
        config = [];
    }
    var fileCount = isMulti == 'True' ? 0 : 1;
    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        initialPreviewAsData: true,
        purifyHtml: true,
        maxFileCount: fileCount,
        initialPreview: data,
        initialPreviewConfig: config,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        var id = data.response.initialPreviewConfig[0].key;
        var hid = $(this).attr('data-id');
        $("#" + hid).val(id);
    }).on('filedeleted', function (event, key) {
        var hid = $(this).attr('data-id');
        $("#" + hid).val('');
    });
}

function InitUploadFileMulti(id) {
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;


    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: [],
        initialPreviewConfig: [],
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }
    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;
}

function InitUploadFileData(id, data) {
    var jsonData = jQuery.parseJSON(data);
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;
    
   
    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: jsonData.initialPreview,
        initialPreviewConfig: jsonData.initialPreviewConfig,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }
    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;
}

function InitUploadFileDataWithKey(id, data, keyID) {
    var jsonData = jQuery.parseJSON(data);
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;


    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id + "&id= " + keyID,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: jsonData.initialPreview,
        initialPreviewConfig: jsonData.initialPreviewConfig,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadcomplete', function(event, files, extra) {
        console.log('File batch upload complete');
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }

    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;

}

function DeleteGoToURL(url, id, urlBack) {
    swal({
        title: "Bạn có chắc chắn không?",
        text: "Thao tác này không thể phục hồi lại được!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Vâng, xóa nó!",
        cancelButtonText: "Không!",
        closeOnConfirm: false
    }, function () {
        $.post(url + '/' + id, function (data) {
            if (data.Code == 1) {
                $(document).ready(function () {
                    swal({
                        title: "Thành công",
                        text: "Dữ liệu này đã được xóa",
                        type: "success"
                    },
                    function () {
                        window.location.href = urlBack;
                    });
                });
            } else {
                swal("Thất bại!", data.Messeger, "error");
            }
        });
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}

function Delete(url, id, divid, urlx, page) {
    //showLoading();
    swal({
        title: "Bạn có chắc chắn không?",
        text: "Thao tác này không thể phục hồi lại được!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Vâng, xóa nó!",
        cancelButtonText: "Không!",
        closeOnConfirm: false
    }, function () {
        var session = $("#HHT_Session").val();
        $.post(url + '/' + id + '?&session=' + (session == null ? '' : session), function (data) {
            if (data.Code == 1) {
                LoadTable(divid, urlx, null);
                //hideLoading();
                swal("Đã xóa!", "Dữ liệu đã được xóa.", "success");
            } else {
                swal("Thất bại!", data.Messeger, "error");
            }
        });
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
   
}

function ModalURL(url) {
    showLoading();
    $.get(url, function (data) {
        $("#ajaxModal").html(data);
        UpdateMask();
        $("#defaultModal").modal();
        hideLoading();
    });
}

function LoadTable(divid, url, page)
{
    if ($("#" + divid).length == 0) {
        return;
    }
    var search = null;
    search = $("#form_search").serialize();
    var pagesize = 20;
    if (page == null)
    {
        if ($("#" + divid).attr('data-page')) {
            page = $("#" + divid).attr('data-page');
        } else {
            page = 1;
        }
    }

    var htmlLoading = '<div class="preloader" style="margin-left: 50%"> <div class="spinner-layer pl-green"> <div class="circle-clipper left"> <div class="circle"></div> </div> <div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>';
    
    //$("#" + divid).html(htmlLoading);

    var session = $("#HHT_Session").val();
    //$("#" + divid).LoadingOverlay("show");

    if (url.indexOf("?") == -1) {
        url += '?';
    } else {
        //url += '&';
    }

    $.post(url + '&page=' + page + '&pagesize=' + pagesize +  ( search == null ? '': '&' + search) + '&session=' + (session == null ? "" : session), function (data) {
        //$(".result").html(data);
        if (data.intStatus != 1) {
            showError(data.strMess);
            $("#" + divid).html(data.strMess);
            $("#" + divid).LoadingOverlay("hide");
        } else {
            var contents = '<table id="' + data.strName +'" class="table-bordered table-striped table-condensed cf dataTable no-footer" style="width: 100%;line-height: 2;">';
            if (data.lstHeader.length > 0) {
                contents += '<thead class="cf"><tr>';
                for (var i = 0; i < data.lstHeader.length; i++) {
                    var header = data.lstHeader[i];
                    var Caption = "";
                    if (header.Caption != "active") {
                        Caption = header.Caption;
                    }
                    if (header.IsShow) {
                        contents += '<th class="f-xs '+ header.Class + '" align="left" data-title="' + header.Caption + '" ' + (header.Width == 0 ? '' : 'width="' + header.Width + '"') + '>' + Caption + '</th>';
                    }
                }

                if (data.isShowAction) {
                    contents += '<th class="f-xs" style="float: right;">&nbsp;</th>';
                }

                contents += '</tr></thead>';
            }
            contents += '<tbody>';
            if (data.lstData.length == 0) {
                var column = data.lstHeader.length;
                if (data.isShowAction) {
                    column++;
                }

                //contents += '<tr><td align="center" colspan="' + column + '"><h5>Không có dữ liệu</h5></td></tr>';
            } else {


                for (var i = 0; i < data.lstData.length; i++) {
                    contents += '<tr>';
                    var objData = data.lstData[i];
                   
                    var col = 0;
                    $.each(objData.objData, function (index, value) {
                        var header = data.lstHeader[col];
                        var textColor = objData.TextColor && objData.TextColor.length > 0  ? objData.TextColor[col] : "";
                        var bgColor = objData.BGColor && objData.BGColor.length > 0 ? objData.BGColor[col] : "";
                        var cssClass = objData.CssClass && objData.CssClass.length > 0 ? objData.CssClass[col] : "";
                        var zCss = "";
                        if (textColor) {
                            zCss += " color: " + textColor + ";";
                        }
                        if (bgColor) {
                            zCss += " background-color: " + bgColor + ";";
                        }

                        //var gridItem = data.
                        col++;
                        if (header.IsShow) {
                            if (header.Format != '') {
                                if (header.Type == 2) {
                                    //Date
                                    //var date = new Date(value);
                                    if (value != null) {
                                        contents += '<td class="' + cssClass +'" style="min-width: 120px;' + zCss+'" align="left" data-title="' + header.Caption + '">' + moment(value).format(header.Format) + '</td>';
                                    } else {
                                        contents += '<td class="' + cssClass + '"  style="min-width: 120px;' + zCss +'" align="left" data-title="' + header.Caption + '"> &nbsp;</td>';
                                    }
                                    
                                } else if (header.Type == 3) {
                                    //Time
                                    if (value == null) {
                                        contents += '<td class="' + cssClass + '"   style="min-width: 120px;' + zCss +'" align="center"  data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        var time = new Date('2016/11/2 ' + value);
                                        contents += '<td class="' + cssClass + '"   style="min-width: 120px;' + zCss +'" align="center"   data-title="' + header.Caption + '">' + moment(time).format(header.Format) + '</td>';
                                    }
                                } else if (header.Type == 4) {
                                    //Boolean
                                    var split = header.Format.split("/");
                                    if (value == null) {
                                        contents += '<td class="' + cssClass +'"    style="' + zCss +'"  align="center" data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        contents += '<td  class="' + cssClass +'"   style="' + zCss +'"  align="center" data-title="' + header.Caption + '"> ' + (value ? split[0] : split[1]) + ' </td>';
                                    }
                                } else if (header.Type == 5) {
                                    //Integer
                                    contents += '<td class="' + cssClass +'"   style="' + zCss +'"   align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td class="' + cssClass +'"   style="' + zCss +'"   align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td  class="' + cssClass +'"   style="' + zCss +'"  data-title="' + header.Caption + '">' + (value == null ? '<img  width="50"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                }
                                else if (header.Type == 98) {
                                    if (header.DataArray[value]) {
                                        value = header.DataArray[value];
                                    } else {
                                        value = null;
                                    }
                                    contents += '<td  class="' + cssClass +'"  style="' + zCss +'"   align="left" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value )+ '</td>';
                                } else {
                                    contents += '<td  class="' + cssClass +'"   style="' + zCss +'"  data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                }
                            } else {
                                if (header.Type == 5) {
                                    //Integer
                                    contents += '<td  class="' + cssClass +'"   style="' + zCss +'"  align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td class="' + cssClass +'"   style="' + zCss +'"   align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td  class="' + cssClass +'"  style="' + zCss +'"    data-title="' + header.Caption + '">' + (value == null ? '<img width="70"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                }
                                else if (header.Type == 98) {
                                    if (header.DataArray[value]) {
                                        value = header.DataArray[value];
                                    } else {
                                        value = null;
                                    }
                                    contents += '<td class="' + cssClass +'"   style="' + zCss +'"   align="left" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                }
                                else if (header.Type == 97) {
                                    if (objData.AvatarObj != null) {
                                        var zHtml = '<a  class="' + cssClass +'"   style="' + zCss +'"   href="' + objData.AvatarObj.URL + '"><img class="hht_avatar" src="' + objData.AvatarObj.Image + '" title="' + objData.AvatarObj.Name + '"/></a>';
                                        contents += '<td class="' + cssClass +'"   style="' + zCss +'"   align="left" data-title="' + header.Caption + '">' + zHtml+'</td>';
                                    } else {
                                        contents += '<td class="' + cssClass +'"    style="' + zCss +'"  align="left" data-title="' + header.Caption + '">#</td>';
                                    }
                                    
                                }
                                else {
                                    contents += '<td  class="' + cssClass +'"   style="' + zCss +'"  data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                }
                                
                            }
                        }
                    });

                    //if (data.isShowAction) {
                    //    contents += '<td style="padding: 5px; " data-title=""><div class="clearfix"><div class="pull-right">';

                    //    if (data.LstExColumn.length > 0)
                    //    {
                    //        for (var j = 0 ; j < objData.ExButtonShow.length;j ++)
                    //        {
                    //            var button = data.LstExColumn[j];
                    //            if (objData.ExButtonShow[j])
                    //            {
                    //                contents += '&nbsp;<a title="' + button.Title + '" data-id="' + objData.ID + '"class="btn _' + button.ID + ' ' + button.Class  + ' bg-'+button.Color+' btn-circle waves-effect waves-circle waves-float" ' + (button.strURL == null ? "" : 'href="' + button.strURL + '/' + objData.ID + '"') + '><i class="material-icons">'+ button.ICon + '</i></a>';
                    //            }
                    //        }
                    //    }


                    //    if (objData.isShowDetail) {
                    //        contents += '&nbsp;<a data-id="' + objData.ID + '"class="btn ' + divid + '_btnDetail bg-orange btn-circle waves-effect waves-circle waves-float" ' + (data.strURLDetail == null ? "" : 'href="' + data.strURLDetail + '/' + objData.ID + ( objData.ExURLDetail == null ? '' : '&' + objData.ExURLDetail ) + '"') + '><i class="material-icons">forward</i></a>';
                    //    }
                    //    if (objData.isShowEdit) {
                    //        if (objData.IsEditModal) {
                    //            contents += '&nbsp;<a  data-id="' + objData.ID + '" href="javascript:ModalURL(\'' + data.strURLEdit + '/' + objData.ID + '?&Session='+data.Session+'&' + objData.ExURLEdit +'\')" class="btn ' + divid + '_btnEdit bg-blue btn-circle waves-effect waves-circle waves-float" ><i class="material-icons">edit</i></a>';
                    //        } else {
                    //            contents += '&nbsp;<a  data-id="' + objData.ID + '"class="btn ' + divid + '_btnEdit bg-blue btn-circle waves-effect waves-circle waves-float"   ' + (data.strURLEdit == null ? "" : 'href="' + data.strURLEdit + '/' + objData.ID + '?&Session='+data.Session+'&' + objData.ExURLEdit + '"') + '><i class="material-icons">edit</i></a>';
                    //        }
                            
                    //    }
                    //    if (objData.isShowDelete) {
                    //        contents += '&nbsp;<a data-id="' + objData.ID + '" href="javascript:Delete(\'' + data.strURLDelete + '\',\'' + objData.ID + '\', \'' + divid + '\',\'' + url + '\',null)"  class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-url="' + data.strURLEdit + '" data-id="' + objData.ID + '"><i class="material-icons">delete</i></a>';
                    //    }

                    //    contents += '</div></div></td>';
                    //}

                    contents += '</tr>';
                }
            }
            contents += '</tbody></table>';
            
            if (data.intTotalPage > 1) {
                contents += '<div class="dataTables_wrapper "><div class="dataTables_paginate paging_simple_numbers"><span>';

                var start = data.intCurrentPage - 5 > 0 ? data.intCurrentPage - 5 : 1;

                for (var i = start; i < data.intCurrentPage ; i ++) {
                    contents += '<a href="javascript:LoadTable(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="paginate_button" aria-controls="tb_hisser"> ' + i + ' </a>';
                }
                contents += '<a class="paginate_button current"> <b>' + data.intCurrentPage + '</b> </a>';
                for (var i = data.intCurrentPage + 1; i < data.intCurrentPage + 5 && i <= data.intTotalPage; i++) {
                    contents += '<a href="javascript:LoadTable(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="paginate_button" aria-controls="tb_hisser"> ' + i + ' </a>';
                }
                contents += '</span></div></div>';
            }

            $("#" + divid).html(contents);
            $("#" + divid).attr('data-page', data.intCurrentPage);
            //loadDataTable(data.strName);
            //$("#" + divid).on("click",".btnModal", function () {
            //    ModalURL($(this).attr('data-url'));
            //});


            //$("#" + divid).LoadingOverlay("hide");
        }
    });
}
function formatNumber(nStr, decSeperate, groupSeperate) {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}
function UpdateMask() {
    $('.file-upload').file_upload();
    $(".int").inputmask("integer", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });
    //$(".int").format({ format: "#.###", locale: "vi-VN" });
    $(".dec").inputmask("decimal", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });
    $(".date").inputmask("d/m/y");
    $(".datetime").inputmask("d/m/y h:s");
    $(".time").inputmask("h:s");
    autosize($('textarea.auto-growth'));

    $('select').selectpicker({
       
    });


    //CKEDITOR.replace('.rich');
    //CKEDITOR.config.height = 300;

    //Datetimepicker plugin
    ////$('.datetime').bootstrapMaterialDatePicker({
    ////    format: 'DD/MM/YYYY HH:mm',
    ////    clearButton: true,
    ////    weekStart: 1
    ////});

    ////$('.date').bootstrapMaterialDatePicker({
    ////    format: 'DD/MM/YYYY',
    ////    clearButton: true,
    ////    weekStart: 1,
    ////    time: false
    ////});

    //$('.time').bootstrapMaterialDatePicker({
    //    format: 'HH:mm',
    //    clearButton: true,
    //    date: false
    //});
   
   

    //$('#defaultModal').on('hidden', function () {
    //    $("#ajaxModal").html('');
    //});
}

function showError(mess) {
    var placementFrom = 'bottom';
    var placementAlign = 'right';
    var animateEnter = '';
    var animateExit = '';
    var colorName = 'bg-red';
    showNotification(colorName, mess, placementFrom, placementAlign, animateEnter, animateExit);
}

function showSuccess(mess) {
    var placementFrom = 'bottom';
    var placementAlign = 'right';
    var animateEnter = '';
    var animateExit = '';
    var colorName = 'bg-green';
    showNotification(colorName, mess, placementFrom, placementAlign, animateEnter, animateExit);
}

function showLoading() {
    $.LoadingOverlay("show");
}

function hideLoading() {
    $.LoadingOverlay("hide");
}

function showAlertSuccess() {
    swal("Thành công!", "Thao tác thành công!", "success");
}

function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { return; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
        message: text
    },
    {
        type: colorName,
        allow_dismiss: allowDismiss,
        newest_on_top: true,
        timer: 1000,
        placement: {
            from: placementFrom,
            align: placementAlign
        },
        animate: {
            enter: animateEnter,
            exit: animateExit
        },
        template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
    });
}

/*
function InitAutoComplate(elementID, elementDisplay,  urlPost) {
    elementID.keyup(function() 
    {
        var searchbox = $(this).val();
        var dataString = searchbox;
        if(searchbox=='') {

        }
        else {
            $.ajax({
                type: "POST",
                url: urlPost,
                data: dataString,
                cache: false,
                success: function(data)
                {
                    if (data.intStatus == 1) {
                        $.each(data.DataAutoComplate, function (index, item) {
                            var label = item.Label;
                            var value = item.Value;
                            var img = item.Images;
                        });
                    } else {
                        elementDisplay.html("").show();
                    }
                    
                }
            });
        }
        return false;
    });
}*/


var helpers =
    {
        buildDropdown: function (result, dropdown, emptyMessage) {
            // Remove current options
            dropdown.html('');
            // Add the empty option with the empty message
            dropdown.append('<option value="">' + emptyMessage + '</option>');
            // Check result isnt empty
            if (result != '') {
                // Loop through each of the results and append the option to the dropdown
                $.each(result, function (k, v) {
                    dropdown.append('<option value="' + v.id + '">' + v.name + '</option>');
                });
            }
            dropdown.selectpicker('refresh');

        }
    }
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
       // document.getElementById("myBtn").style.display = "block";
    } else {
        // document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    $('html, body').animate({ scrollTop: 0 }, 'slow');
}
