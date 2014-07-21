var peopleForE;
var peopleForP;
var peopleForR;
var tId;
$(function() {

	var strFullPath = window.document.location.href;
	var strPath = window.document.location.pathname;
	var pos = strFullPath.indexOf(strPath);
	var prePath = strFullPath.substring(0, pos);
	// var postPath = strPath.substring(0, strPath.substr(1).indexOf('/') + 2);

	// $rootpath = prePath + '/';

	var taskId = getParameterValue("tid");
	tId = taskId;
	// alert(taskId);
	$
			.ajax({
				cache : false,
				url : prePath + '/' + "reportsummary.do?taskId=" + taskId,
				type : "POST",
				contentType : 'application/json;charset=UTF-8',
				async : false,
				dataType : "json",
				success : function(json) {
					if (!json) {
						alert("请求出错，看看网络是否正常 ！");
					}
					var appIntroduction = json.appIntroduction;
					var appName = json.appName;
					var appSize = json.appSize;
					var iconUrl = json.iconUrl;
					peopleForE = json.peopleForE; // 下发
					peopleForP = json.peopleForP; // 接受
					peopleForR = json.peopleForR; // 执行
					var reportTime = json.reportTime;
					var startTimeForF = json.startTimeForF;
					var taskName = json.taskName;
					var taskis = json.taskis;
					var verCode = json.verCode;
					var verName = json.verName;
					var iconUrl = json.iconUrl;

					$("#detailTable1 tr:eq(0) td:eq(0)").html(
							getLocalTime(startTimeForF));
					$("#detailTable1 tr:eq(1) td:eq(0)").html(
							getLocalTime(reportTime));
					$("#detailTable1 tr:eq(2) td:eq(0)").html(peopleForP);
					$("#detailTable1 tr:eq(3) td:eq(0)").html(peopleForR);
					$("#detailTable1 tr:eq(4) td:eq(0)").html(peopleForE);
					showGraphic();
					reportbugdetail();

				},
				error : function(data) {
				},
				complete : function() {
				}
			});
});
// 图表显示功能
function showGraphic() {
	var confirmBug = 0;
	var confirmNoBug = 0;
	var noHandleBug = 0;
	var handelBug = 0;
	$.ajax({
		cache : false,
		url : prePath + '/' + "reportbugstatuscount.do?taskId=" + tId,
		type : "POST",
		contentType : 'application/json;charset=UTF-8',
		async : false,
		dataType : "json",
		success : function(json) {

			for (var i = 0; i < json.length; i++) {
				if (json[i].status == 1)
					confirmNoBug = json[i].num;

				if (json[i].status == 3)
					confirmBug = json[i].num;

				if (json[i].status == 4)
					handelBug = json[i].num;

				if (json[i].status == 0)
					noHandleBug = json[i].num;
			}
			$("#bugSituationTable tr:eq(0) td:eq(0)").html(
					confirmBug + confirmNoBug + handelBug + noHandleBug);

			$("#bugSituationTable tr:eq(0) td:eq(1)").html();
			$("#bugSituationTable tr:eq(1) td:eq(0)").html(noHandleBug);
			$("#bugSituationTable tr:eq(1) td:eq(1)").html(confirmBug);
			$("#bugSituationTable tr:eq(2) td:eq(0)").html(confirmNoBug);
			$("#bugSituationTable tr:eq(2) td:eq(1)").html(handelBug);
		},
		error : function(data) {
		},
		complete : function() {
		}
	});

	var dataset = [ {
		label : "未确认",
		data : noHandleBug,
		color : "#A8A8A8"
	}, {
		label : "非BUG",
		data : confirmNoBug,
		color : "#00AAAA"
	}, {
		label : "是BUG",
		data : confirmBug,
		color : "#FF0000"
	}, {
		label : "已解决",
		data : handelBug,
		color : "#1E6F40"
	} ];
	$.plot($("#genderGraphic"), dataset, {
		series : {
			pie : {
				innerRadius : 0.5,
				show : true
			}
		},
		grid : {
			hoverable : true,
			clickable : true
		}

	});
	$("#genderGraphic").bind(
			"plothover",
			function(event, pos, obj) {
				if (!obj) {
					return;
				}
				var percent = parseFloat(obj.series.percent).toFixed(2);
				$("#flot-memo").html(
						"<span style='font-weight:bold; color:"
								+ obj.series.color + "'>" + obj.series.label
								+ " (" + percent + "%)</span>");
			});

	// $("#genderGraphic").bind("plotclick", function(event, pos, obj) {
	// if (!obj) {
	// return;
	// }
	// percent = parseFloat(obj.series.percent).toFixed(2);
	// alert("" + obj.series.label + ": " + percent + "%");
	// });
}
function getLocalTime(nS) {

	if (($.trim(nS).length <= 10))
		// return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g,
		// "-").replace(/日/g, " ").replace(/上午|下午/g, "");
		return formatDate(parseInt(nS) * 1000);
	else
		// return new Date(parseInt(nS)).toLocaleString().replace(/年|月/g,
		// "-").replace(/日/g, " ").replace(/上午|下午/g, "");
		return formatDate(parseInt(nS));
}

function getParameterValue(name) {
	var value = "";
	var url = location.href;
	var position = url.indexOf("?");
	var parameterStr = url.substr(position + 1);// Get the string after ?
	var arr = parameterStr.split("&");
	for (var i = 0; i < arr.length; i++) {
		var parameter = arr[i].split("=");
		if (parameter[0] == name) {
			value = parameter[1];
		}
	}
	return value;
}
function reportbugdetail() {

	$("#peopleTable tr:eq(0) td:eq(0)").html(peopleForP);
	$("#peopleTable tr:eq(0) td:eq(1)").html(peopleForR);
	$("#peopleTable tr:eq(0) td:eq(2)").html(peopleForE);

	$
			.ajax({
				cache : false,
				url : prePath + '/' + "reportbugdetail.do?taskId=" + tId,
				type : "POST",
				contentType : 'application/json;charset=UTF-8',
				async : false,
				dataType : "json",
				success : function(json) {
					var i = 0;
					var j = 0;
					// for(i=0;i<phoneList.length;i++){
					// }
					for (i = 0; i < json.bugjson.length; i++) {
						$("#bugTable")
								.append(
										"<tr>" + "<td style='width:65px;'>"
												+ json.bugjson[i].bugid
												+ "</td>"
												+ "<td>"
												+ json.bugjson[i].name
												+ "</td>"
												+ "<td>"
												+ json.bugjson[i].model
												+ "</td>"
												+ "<td >"
												+ json.bugjson[i].firmwareVer
												+ "</td>"
												+ "<td>"
												+ json.bugjson[i].dpiW
												+ "×"
												+ json.bugjson[i].dpiH
												+ "</td>"
												+ "<td>"
												+ json.bugjson[i].cpuModel
												+ "</td>"
												+ "<td>"
												+ (json.bugjson[i].ramSize / (1024 * 1024))
														.toFixed(2)
												+ "MB</td>"
												+ "<td>"
												+ getLocalTime(json.bugjson[i].time)
												+ "</td>"

												// <a class='fancybox_button'
												// rel='fancybox_button' href='"
												// + json.pics[i].fileUrl
												// + "'><img src='"
												// + json.pics[i].fileUrl
												// + "' width='160' height='90'
												// alt='' /></a>

												+ "<td><a id='fancybox_page'  rel='fancybox_button' class='fancybox fancybox.iframe' href='"
												+ $rootpath
												+ "jump.do?action=3004&bugid="
												+ json.bugjson[i].bugid
												+ "'>查看</a></td>" + "</tr>");
					}
					for (j = 0; j < json.phonejson.length; j++) {
						$("#phoneTable")
								.append(
										"<tr><td>"
												+ json.phonejson[j].model
												+ "</td><td>"
												+ json.phonejson[j].firmwareVer
												+ "</td>"
												
												+ "<td style='text-align:right;'>"
												+ json.phonejson[j].confirmBugNum
												+ "/"
												+ (json.phonejson[j].confirmBugNum
														/ json.phonejson[j].bugNumSum * 100)
														.toFixed(2)
												+ "</td>"
												
												+ "</tr>");
					}
					for (j = 0; j < json.testerjson.length; j++) {
						$("#testerTable")
								.append(
										"<tr>" + "<td>"
												// + json.testerjson[j].email
												// + "</td>"
												// + "<td>"
												+ json.testerjson[j].name
												+ "</td>"
												+ "<td style='text-align:right;'>"
												+ json.testerjson[j].bugNum
												+ "/"
												+ (json.testerjson[j].bugNum
														/ json.testerjson[j].bugNumSum * 100)
														.toFixed(2)
												+ "</td>"
												+ "<td style='text-align:right;'>"
												+ json.testerjson[j].confirmBugNum
												+ "/"
												+ (json.testerjson[j].confirmBugNum
														/ json.testerjson[j].bugNumSum * 100)
														.toFixed(2)
												+ "</td>"
												
												+ "</tr>");

					}
					senfe("testerTable","#F1F1F1","#fff"); 
					senfe("phoneTable","#F1F1F1","#fff"); 

					reportanswers();
				},
				error : function(data) {
				},
				complete : function() {
				}
			});

};

function senfe(o,a,b){ 
	var t=document.getElementById(o).getElementsByTagName("tr"); 
	for(var i=0;i<t.length;i++){ 
		t[i].style.backgroundColor=(t[i].sectionRowIndex%2==0)?a:b; 
	} 
} 

