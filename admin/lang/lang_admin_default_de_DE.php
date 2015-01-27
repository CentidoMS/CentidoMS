<?php
	/**
	 * Deutsche Sprachdatei
	 *
	 * @package CentidoMS
	 */
	
	$sys["lang"]["language_code"] = "de";
	$sys["lang"]["country_code"] = "DE";
	$sys["lang"]["language_country_code"] = $sys["lang"]["language_code"]."-".$sys["lang"]["country_code"];
	
	// General
	
	define("LANG_ADMIN_DEFAULT_GENERAL_CANCEL", "Abbrechen");
	define("LANG_ADMIN_DEFAULT_GENERAL_RESET", "Zurücksetzen");
	define("LANG_ADMIN_DEFAULT_GENERAL_DELETE", "Löschen");
	define("LANG_ADMIN_DEFAULT_GENERAL_EDIT", "Bearbeiten");
	define("LANG_ADMIN_DEFAULT_GENERAL_SAVE", "Speichern");
	define("LANG_ADMIN_DEFAULT_GENERAL_DEFAULT", "Standard");
	define("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH", "Veröffentlichen");
	define("LANG_ADMIN_DEFAULT_GENERAL_DEPUBLISH", "Entöffentlichen");
	define("LANG_ADMIN_DEFAULT_GENERAL_UPDATE", "Aktualisieren");
	define("LANG_ADMIN_DEFAULT_GENERAL_UPLOAD", "Hochladen");
	define("LANG_ADMIN_DEFAULT_GENERAL_UNINSTALL", "Deinstallieren");
	define("LANG_ADMIN_DEFAULT_GENERAL_ADD", "Hinzufügen");
	define("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT", "Füllen sie dieses Feld aus!");
	define("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT_OK", "Dieses Feld ist korrekt ausgefüllt.");
	define("LANG_ADMIN_DEFAULT_GENERAL_ID", "Id");
	define("LANG_ADMIN_DEFAULT_GENERAL_CLASSES", "Klassen");
	define("LANG_ADMIN_DEFAULT_GENERAL_YES", "Ja");
	define("LANG_ADMIN_DEFAULT_GENERAL_NO", "Nein");
	
	// End general
	
	// Login
	
	define("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_LOGOUT_SUCCESFULL", "Erfolgreich abgemeldet!");
	define("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_LOGIN_FAILED", "Anmeldung fehlgeschlagen!");
	define("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_SESSION_EXPIRED", "Sitzung abgelaufen!");
	define("LANG_ADMIN_DEFAULT_LOGIN_USERNAME", "Benutername");
	define("LANG_ADMIN_DEFAULT_LOGIN_PASSWORD", "Passwort");
	define("LANG_ADMIN_DEFAULT_LOGIN_SIGNIN", "Anmelden");
	
	// End login

	// Mainmenu
	
	define("LANG_ADMIN_DEFAULT_MAINMENU_DASHBOARD", "Dashboard");
	define("LANG_ADMIN_DEFAULT_MAINMENU_CONTENT", "Inhalt");
	define("LANG_ADMIN_DEFAULT_MAINMENU_POST", "Beitrag");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_POSTS", "Alle Beiträge");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ADD_POST", "Beitrag hinzufügen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_MENU", "Menü");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_MENUS", "Alle Menüs");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ADD_MENU", "Menü hinzufügen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_USER_MANAGEMENT", "Benutzer");
	define("LANG_ADMIN_DEFAULT_MAINMENU_USER", "Benutzer");
	define("LANG_ADMIN_DEFAULT_MAINMENU_CURRENT_USER", "Aktueller Benutzer");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_USERS", "Alle Benutzer");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ADD_USER", "Benutzer hinzufügen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_GROUP", "Gruppe");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_GROUPS", "Alle Gruppen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ADD_GROUP", "Gruppe hinzufügen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_EXTENSIONS", "Erweiterungen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_EXTENSION_INSTALLER", "Installationsmanager");
	define("LANG_ADMIN_DEFAULT_MAINMENU_PLUGINS", "Plugins");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_PLUGINS", "Alle Plugins");
	define("LANG_ADMIN_DEFAULT_MAINMENU_THEMES", "Themes");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_THEMES", "Alle Themes");
	define("LANG_ADMIN_DEFAULT_MAINMENU_MODS", "Mods");
	define("LANG_ADMIN_DEFAULT_MAINMENU_ALL_MODS", "Alle Mods");
	define("LANG_ADMIN_DEFAULT_MAINMENU_SYSTEM", "System");
	define("LANG_ADMIN_DEFAULT_MAINMENU_SETTINGS", "Einstellungen");
	define("LANG_ADMIN_DEFAULT_MAINMENU_LOG_OUT", "Abmelden");
	
	// End mainmenu
	
	// Dashboard
	
	define("LANG_ADMIN_DEFAULT_DASHBOARD_HEADING", "Dashboard");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_WELCOM", "Willkommen im Backend von CentidoMS!");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_WELCOM_TEXT", "Vielen Dank das sie gerade die Pre-Alpha Version von CentidoMS nutzen. Das Dashboard soll dazu da sein, um Informationen auf einem Blick zu haben. Da jedoch CentidoMS in der Pre-Alpha Status ist, ist das Dashboard noch ohne nützliche Informationen. Alle anderen Seiten sollen aber ordnungsgemäss nutzbar sein.");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_USERNAME", "Benutername:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_LANGUAGE", "Sprache:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_GROUP", "Gruppe:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_SITENAME", "Name der Website:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_LAST_REFRESH", "Seite zuletzt aktualisiert:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_IP_ADDRESS", "Angemeldete IP-Addresse:");
	define("LANG_ADMIN_DEFAULT_DASHBOARD_LOCATION", "Ort des Clients:");
	
	// End dashboard
	
	// Content management
	
	// General post
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST", "Beitrag");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE", "Titel des Beitrags");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_PERMALINK", "Permalink");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_CONTENT", "Inhalt");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS", "Status");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS_DRAFT", "Entwurf");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS_PUBLISHED", "Veröffentlicht");
	
	// End general post
	
	// All posts
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_HEADING", "Alle Beiträge");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_DELETE_SUCCESSFULL", "Beitrag wurde erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_ADD_SUCCESSFULL", "Beitrag wurde erfolgreich hinzugefügt!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_UPDATE_SUCCESSFULL", "Beitrag wurde erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_SELECT_POST", "Wählen sie erst einen Beitrag aus!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_TITLE", "Titel");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_PAGE", "Seite");
	
	// End all posts
	
	// Edit post
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_EDIT_POST_HEADING", "Beitrag bearbeiten");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_EDIT_POST_PAGE_QUESTION", "Soll dieser Inhalt als Seite verwendet werden?");
	
	// End edit post
	
	// Add post
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ADD_POST_HEADING", "Beitrag hinzufügen");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ADD_POST_PAGE_QUESTION", "Soll dieser Inhalt als Seite verwendet werden?");
	
	// General category
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY", "Kategorie");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_CATEGORIES", "Kategorien");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME", "Kategoriename");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG", "Slug");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_HIGHER", "Übergeordnet");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_DEFAULT_CATEGORY", "Hauptkategorie");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_ORDER", "Reihenfolge");
	
	// End general category
	
	// Categories
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_DEFAULT_CATEGORY", "Hauptkategorie");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_ADD_SUCCESSFULL", "Kategorie wurde erfolgreich hinzugefügt.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_SUCCESSFULL", "Kategorie wurde erfolgreich gelöscht.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_UPDATE_SUCCESSFULL", "Kategorie wurde erfolgreich aktualisiert.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_MOVE_ALL_LOWER_CATEGORIES", "Sie müssen zuerst alle Unterkategorien von dieser Kategorie entfernen, bevor sie diese löschen!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_MOVE_ALL_POSTS", "Sie müssen zuerst alle Beiträge von dieser Kategorie entfernen, bevor sie dieses löschen!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_SET_OTHER_DEFAULT_CATEGORY", "Eine Hauptkategorie kann man nicht löschen! Setzen sie zuerst eine neue Hauptkategorie!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_CHANGE_DEFAULT_CATEGORY_SUCCESSFULL", "Die neue Hauptkategorie wurde gesetzt.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_TOOLTIP_SLUG", "Ein Slug ist ein Name, der keine Sonderzeichen oder Abstände enthält ('_' und '@' sind erlaubt).");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_TOOLTIP_DEFAULT_CATEGORY", "Mit diesem Button kann man eine Kategorie zur Hauptkategorie setzen.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_TOOLTIP_ORDER", "Mit den Pfeilen unten kann man die Reihenfolge der Kategorien ändern (Innerhalb ihrer vorgesetzten Kategorie).");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_DESCRIPTION_SELECT_CATEGORY", "Um eine Kategorie zu bearbeiten, wählen sie diese rechts aus.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_NAME_IS_OK", "Dieser Name kann verwendet werden.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_SLUG_IS_RESERVED", "Dieser Slug ist besetzt!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_ORDER_UNREMOVABLE", "Diese Kategorie ist nicht verschiebbar.");
	
	// End categories
	
	// General menu
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_MENU", "Menü");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_MENUS", "Menüs");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_ITEMS", "Items");
	
	// End general menu
	
	// Menus
	
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_ADD_MENU_SUCCESSFULL", "Menü wurde erfolgreich hinzugefügt.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_UPDATE_MENU_SUCCESSFULL", "Menü wurde erfolgreich bearbeitet.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_DELETE_MENU_SUCCESSFULL", "Menü wurde erfolgreich gelöscht.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_ADD_ITEM_SUCCESSFULL", "Item wurde erfolgreich hinzugefügt.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_EDIT_ITEM_SUCCESSFULL", "Item wurde erfolgreich bearbeitet.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_DELETE_ITEM_SUCCESSFULL", "Item wurde erfolgreich gelöscht.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_MENU_NAME_RESERVED", "Dieser Menüname ist besetzt!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_MOVE_ALL_LOWER_ITEMS", "Verschieben oder Löschen sie erst alle Items die zum Item, welches sie löschen wollen, gehören.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_SELECT_CATEGORY", "Wählen sie eine Kategorie aus!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_FILL_OUT", "Füllen sie alle Felder aus!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_TOOLTIP_ORDER", "Mit den unteren Pfeilen kann man die Reihenfolge der Items ändern (Innerhalb ihrens vorgesetzten Items).");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_DESCRIPTION_SELECT_ITEM", "Um ein Item zu bearbeiten, wählen sie dieses rechts aus.");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ORDER", "Reihenfolge");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ORDER_UNREMOVABLE", "Dieses Item ist nicht verschiebbar!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_HIGHER", "Übergeordnet");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_MENU", "Menü hinzufügen");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MENU_NAME", "Menüname");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK", "Link");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_LINK", "Link hinzufügen");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME", "Linkname");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL", "URL");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_CATEGORY", "Kategorie hinzufügen");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_NO_MENUS", "Sie haben noch keine Menüs erstellt!");
	define("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_SELECT_POSITION", "Position auswählen");
	
	// End menus
	
	// End content management
	
	// User management
	
	// Permissions
	
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDUSER", "Benutzer hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITUSER", "Benutzer bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELUSER", "Benutzer löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDGROUP", "Gruppen hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITGROUP", "Gruppen bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELGROUP", "Gruppen löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDPOST", "Artikel hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITPOST", "Artikel bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELPOST", "Artikel löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDCATEGORY", "Kategorie hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITCATEGORY", "Kategorie bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELCATEGORY", "Kategorie löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDMENU", "Menü hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITMENU", "Menü bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELMENU", "Menü löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDMENUITEM", "Menüitem hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITMENUITEM", "Menüitem bearbeiten");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELMENUITEM", "Menüitem löschen");
	
	// End permissions
	
	// General user
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_FIRST_NAME", "Vorname:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LAST_NAME", "Nachname:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_USERNAME", "Benutzername*:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD", "Passwort*:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD_REPEAT", "Passwort wiederholen*:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_GROUP", "Gruppe:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LANG", "Sprache:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_MAIL", "Mail*:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_WEBSITE", "Webseite:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_BIO", "Biografie:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_OWNER", "Besitzer");
	
	// End general user
	
	// All users
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_HEADING", "Alle Benutzer");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_DELETE_SUCCESSFULL", "Benutzer wurde erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_UPDATE_SUCCESSFULL", "Benutzer wurde erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_SELECT_USER", "Wählen sie erst einen Benutzer aus!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_FILL_OUT", "Füllen sie alle Pflichtfelder aus!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_PASSWORD", "Die Passwörter stimmen nicht überein!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_USER_EXIST", "Der Benutzername ist besetzt! Versuchen sie es mit einem anderen Benuternamen!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_DONT_DELETE_OWNER", "Löschen sie nicht den Besitzer!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_USERNAME", "Benutzername");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_GROUP", "Gruppe");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MAIL", "E-Mail");
	
	// End all users
	
	// Edit user
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_USER_HEADING", "Benutzer bearbeiten");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_USER_SUBMIT", "Benutzer aktualisieren");
	
	// End edit user
	
	// Current user
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_CURRENT_USER_HEADING", "Aktueller Benutzer");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_CURRENT_USER_MESSAGE_UPDATE_SUCCESSFULL", "Benutzer wurde erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_CURRENT_USER_MESSAGE_FILL_OUT", "Füllen sie alle Pflichtfelder aus!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_CURRENT_USER_MESSAGE_PASSWORD", "Die Passwörter stimmen nicht überein!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_CURRENT_USER_MESSAGE_USER_EXIST", "Der Benutzername ist besetzt! Versuchen sie es mit einem anderen Benuternamen!");
	
	// End current user
	
	// Add user
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_HEADING", "Benutzer hinzufügen");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_SUCCESSFULL", "Benutzer wurde erfolgreich hinzugefügt!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_FILL_OUT", "Füllen sie alle Pflichtfelder aus!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_PASSWORD", "Die Passwörter stimmen nicht überein!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_USER_EXIST", "Der Benutzername ist besetzt! Versuchen sie es mit einem anderen Benuternamen!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_SUBMIT", "Benutzer hinzufügen");
	
	// End add user
	
	// General group
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_GROUP_SHORTCUT", "Referenz:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_GROUP_GROUP_NAME", "Gruppenname:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_GROUP_PERMISSIONS", "Berechtigungen:");
	
	// End general group
	
	// All groups
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_DELETE_SUCCESSFULL", "Gruppe wurde erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_UPDATE_SUCCESSFULL", "Gruppe wurde erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_SELECT_GROUP", "Sie müsssen erst eine Gruppe auswählen!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_DELETE_USERS", "Sie müssen erst alle Benutzer, die in dieser Gruppe sind, in eine andere Gruppe versetzen!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_HEADING", "Alle Gruppen");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_TABLE_HEADING_GROUP", "Gruppe");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_TABLE_HEADING_SHORTCUT", "Shortcut");
	
	// End all groups
	
	// Edit group
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_HEADING", "Gruppe bearbeiten");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_SHORTCUT", "Referenz:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_GROUP_NAME", "Gruppenname:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_PERMISSIONS", "Berechtigungen:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_SUBMIT", "Gruppe aktualisieren");
	
	// Edit Group
	
	// Add group
	
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_SUCCESSFULL", "Gruppe wurde erfolgreich hinzugefügt");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_FILL_OUT", "Füllen sie alle Pflichtfelder aus!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_GROUP_EXIST", "Die Gruppe existiert schon!");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_HEADING", "Gruppe hinzufügen");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_SHORTCUT", "Referenz:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_GROUP_NAME", "Gruppenname:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_PERMISSIONS", "Berechtigungen:");
	define("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_SUBMIT", "Gruppe hinzufügen");
	
	// End add group
	
	// End user management
	
	// Extensions
	
	// Permissions
	
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_ADDEXTENSIONS", "Erweiterungen hinzufügen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_DELEXTENSIONS", "Erweiterungen löschen");
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITEXTENSIONS", "Erweiterungen bearbeiten");
	
	// End permissions
	
	// Extension installer
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_INSTALLATION_SUCCESSFULL", "Installation erfolgreich abgeschlossen!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_UPLOAD_FAILED", "Upload ist fehlgeschlagen!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_NOT_ZIP", "Keine Zip-Datei hochgeladen!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_FILE_SIZE_TOO_LARGE", "Zip-Datei ist zu gross!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_NO_EXTENSIONINFO", "Keine 'ExtensionInfo.xml' gefunden!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_EXTENSION_EXIST", "Eine ähnliche Erweiterung wurde gefunden!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_HEADING", "Installationsmanager");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_DESCRIPTION", "Um ein Theme, Plugin, Sprache oder Mod zu installieren, muss man nur die Zip-Datei mit der Erweiterung auswählen und hochladen. Der Rest wird automatisch ausgeführt.");
	
	// End extension installer
	
	// All plugins
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_MESSAGE_DELETE_SUCCESSFULL", "Plugin erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_HEADING", "Alle Plugins");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_VERSION", "Version");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_DESCRIPTION", "Beschreibung");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_NO_PLUGINS", "Keine Plugins");
	
	// End all plugins
	
	// Edit plugin
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_MESSAGE_UPDATE_SUCCESSFULL", "Plugin wurde erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_HEADING", "Plugin bearbeiten");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_DESCRIPTION", "Beschreibung");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_VERSION", "Version");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_DATE", "Datum");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_LICENSE", "Lizenz");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_POSITIONS", "Positionen");
	
	// End edit plugin
	
	// All themes
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_DELETE_SUCCESSFULL", "Theme erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_SET_DEFAULT_SUCCESSFULL", "Theme erfolgreich als Standard gewählt!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_DELETE_SET_OTHER_DEFAULT_THEME", "Eine Haupttheme kann man nicht löschen! Setzen sie zuerst eine neue Haupttheme!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_HEADING", "Alle Themes");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_VERSION", "Version");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_DESCRIPTION", "Beschreibung");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MAIN_THEME", "Haupttheme");
	
	// End all themes
	
	// Edit theme
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_HEADING", "Theme bearbeiten");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_VERSION", "Version");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_DATE", "Datum");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_LICENSE", "Lizenz");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_POSITIONS", "Positionen");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_MENUS", "Menüs");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_DESCRIPTION", "Beschreibung");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_PREVIEW", "Vorschau");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_NO_PLAN", "Diese Stelle ist noch nicht fertig, jedoch ist sie auch nicht wichtig! In einer späteren Version wird diese Stelle sicher da sein.");
	
	// End edit theme
	
	// All plugins
	
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_MESSAGE_DELETE_SUCCESSFULL", "Mod erfolgreich gelöscht!");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_HEADING", "Alle Mods");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_NAME", "Name");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_VERSION", "Version");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_AUTHOR", "Autor");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_EDIT", "Bearbeiten");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_UNEDITABLE", "Nicht bearbeitbar");
	define("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_NO_MODS", "Keine Mods");
	
	// End all plugins
	
	// End extensions
	
	// System
	
	// Permissions
	
	define("LANG_ADMIN_DEFAULT_PERMISSIONS_EDITSETTINGS", "Einstellungen bearbeiten");
	
	// End permissions
	
	// Settings
	
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_MESSAGE_UPDATE_SUCCESSFULL", "Einstellungen erfolgreich aktualisiert!");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_MESSAGE_EMPTY_SITENAME", "Sie müssen einen Seitentitel angeben!");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_EDIT_SETTINGS", "Einstellungen bearbeiten");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SETTINGS", "Einstellungen");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITENAME", "Seitentitel");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_SLOGAN", "Slogan der Website");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_DESCRIPTION", "Beschreibung der Website");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_HOMEPAGE", "Startseite");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DEFAULT_HOMEPAGE", "Standard-Startseite");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DEFAULT_LANGUAGE", "Hautsprache");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_INFORMATIONS", "Informationen");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_GENERAL_INFORMATIONS", "Allgemeine Informationen");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_ROOT_ABSOLUTE_PFATH", "Absoluter Pfad von der Website");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_ROOT_URL", "URL von der Website");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_INFORMATIONS", "Datenbankinformationen");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_SERVER", "Datenbankserver");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE", "Datenbank");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_USER", "Datenbanknutzer");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_PREFIX", "Datenbank-Präfix");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_NOTE", "Hinweis");
	define("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_NOTE_TEXT", "Um die obenstehenden Einstellungen zu ändern, muss man die 'settings.php' im Hauptverzeichnis der Installation ändern.");
	
	// End settings
	
	// End system
?>