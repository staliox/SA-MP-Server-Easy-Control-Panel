#include <a_samp>
#include <a_mysql>
#define FILTERSCRIPT
new MySQL:sql;
public OnFilterScriptInit()
{
	sql = mysql_connect("127.0.0.1", "root", "", "cp_samp");
	if (sql == MYSQL_INVALID_HANDLE || mysql_errno(sql) != 0)
	{
		return print("MySQL Connection Isn't Successful. (CP_Samp)");
	}
	print("MySQL Connection Is Successful. (CP_Samp)");
	SetTimer("CheckDatas", 3000, 1);
	return 1;
}
forward CheckDatas();
public CheckDatas()
{
	mysql_tquery(sql, "SELECT * FROM `data` WHERE `ID`='1'", "QueryCallback");
	return 1;
}
forward QueryCallback();
public QueryCallback()
{
	new shoulddo;
	cache_get_value_int(0, "Data_ID", shoulddo);
	if(shoulddo == 1)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("Server Name Is Changed From CP_Samp | Name: %s", name);
		format(string, sizeof(string), "hostname %s", name);
		SendRconCommand(string);
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	if(shoulddo == 2)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("Server Password Is Changed From CP_Samp | Password: %s", name);
		format(string, sizeof(string), "password %s", name);
		SendRconCommand(string);
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	if(shoulddo == 3)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("Server Is Restarting From CP_Samp | Reason: %s", name);
		for(new i=0; i<=MAX_PLAYERS; i++) {
		    format(string, sizeof(string), "Server Is Restarting ... | Reason: %s", name);
			SendClientMessage(i, -1, string);
		}
		SendRconCommand("gmx");
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	if(shoulddo == 4)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("A Player Banned From CP_Samp | Name Or ID: %s", name);
		format(string, sizeof(string), "ban %s", name);
		SendRconCommand(string);
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	if(shoulddo == 5)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("A IP Banned From CP_Samp | IP: %s", name);
		format(string, sizeof(string), "banip %s", name);
		SendRconCommand(string);
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	if(shoulddo == 6)
	{
		new name[255], string[84];
		cache_get_value_name(0, "Data_Name", name);
		printf("A Message Sent From CP_Samp | Message: %s", name);
		for(new i=0; i<=MAX_PLAYERS; i++) {
		    format(string, sizeof(string), "{FFFF00}[SERVER-MSG]: {C3C3C3}%s", name);
			SendClientMessage(i, -1, string);
		}
		mysql_tquery(sql, "UPDATE `data` SET `Data_ID`='0', `Data_Name`='' WHERE `ID`='1'");
	}
	return 1;
}
