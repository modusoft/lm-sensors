#!/bin/sh
cp package-info ~/var/check_mk/packages/lmsensors
cp agent/lmsensors ~/local/share/check_mk/agents/
cp checkman/lmsensors ~/local/share/check_mk/checkman/
cp checks/lmsensors ~/local/share/check_mk/checks/

cp pnp-templates/*.php ~/local/share/check_mk/pnp-templates/
cp web/plugins/perfometer/lmsensors.py ~/local/share/check_mk/web/plugins/perfometer/lmsensors.py

