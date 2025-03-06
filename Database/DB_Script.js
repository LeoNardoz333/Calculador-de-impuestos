use calculadorImpuestos

db.createUser(
  {
    user: "usuario_impuestos",
    pwd: "CalImp290",
    roles: [
       { role: "readWrite", db: "calculadorImpuestos" },
       { role: "dbAdmin", db: "calculadorImpuestos" }
    ]
  }
)

db.auth("usuario_impuestos", "CalImp290")
