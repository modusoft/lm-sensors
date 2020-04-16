def perfometer_check_mk_lmsensors(row, check_command, perf_data):
	if row['service_state'] == 0:
		color = '#00FF00'
	else:
		color = '#FF0000'
	# [(u'+12V', u'12.0', u'', u'', u'15.94', u'', u'')]
	curval = perf_data[0][1]
	perc = 100
	if perf_data[0][4] != "" and savefloat(perf_data[0][4]) != 0:
		perc = float(curval) / savefloat(perf_data[0][4]) * 100.0
	h = '<table><tr>'
	h += perfometer_td(perc, color);
	h += perfometer_td(100 - perc, '#FFF');
	h += '</tr></table>'
	return "%s" % curval, h

perfometers["check_mk-lmsensors.fan"]  = perfometer_check_mk_lmsensors
perfometers["check_mk-lmsensors.temp"] = perfometer_check_mk_lmsensors
perfometers["check_mk-lmsensors.volt"] = perfometer_check_mk_lmsensors
