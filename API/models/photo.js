/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('photo', {
    'id_photo': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'titre': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'urlImage': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'visible': {
      type: DataTypes.INTEGER(1),
      allowNull: false,
      comment: "null"
    },
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'personne',
        key: 'id_personne'
      }
    },
    'id_activite': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'activite',
        key: 'id_activite'
      }
    }
  }, {
    tableName: 'photo'
  });
};
