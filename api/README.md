# Utilisation de l'API
## Pour créer un objet
`GET http://localhost/api.php?action=creer&champ1=val1&champ2=val2`

=> retourne l'objet créé en json

## Pour récupérer UN objet
`GET http://localhost/api.php?action=consulter&id=id_désiré`

=> retourne l'objet en json

## Pour récupérer DES objets
`GET http://localhost/api.php?action=index`

=> retourne les objets en json

## Pour modifier un objet
`GET http://localhost/api.php?action=modifier&id=id_désiré&champ1=val1&champ2=val2`

=> retourne l'objet modifié en json

## Pour supprimer un objet
`GET http://localhost/api.php?action=supprimer&id=id_désiré`

=> retourne ??
