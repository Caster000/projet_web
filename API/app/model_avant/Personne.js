/* jshint indent: 2 */
const db = require('../models/db')
const DataTypes = require('sequelize').DataTypes;

module.exports = db.define('personne', {
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'nom': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'prenom': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'id_campus': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
	  references: {
        model: 'campus',
        key: 'id_campus'
      }
    },
    'email': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'password': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'id_role': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'role',
        key: 'id_role'
      }
    }
  }, {timestamps: false,
        freezeTableName: true,
        subQuery: false,
    tableName: 'personne'
  });

