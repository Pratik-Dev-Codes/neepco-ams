# ensure running as root
if [ "$(id -u)" != "0" ]; then
    #Debian doesnt have sudo if root has a password.
    if ! hash sudo 2>/dev/null; then
        exec su -c "$0" "$@"
    else
        exec sudo "$0" "$@"
    fi
fi

wget https://github.com/Pratik-Dev-Codes/neepco-ams/blob/master/neepco_ams.sh
chmod 744 neepco_ams.sh
./neepco_ams.sh 2>&1 | tee -a /var/log/neepco_ams-install.log
